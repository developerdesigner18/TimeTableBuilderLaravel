<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\configtable;
use App\Models\sections;
use App\Models\tableslots;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class TimetableController extends Controller
{
    public function allclasslist()
    {
        $class = DB::select('select * from classes');
        return response()->json($class);
    }
    public function checkconfig(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'classid' => 'required',
            'sectionid' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }
        try{
            $config = configtable::where(["classid"=>$request->classid ,"sectionid"=>$request->sectionid])->first();
            if($config){
                $slottables = tableslots::where(['configid'=>$config->id])->first();
            }
            return response()->json(["data"=>$config,"status"=>"200","slot"=>$slottables ?? []]);
        }catch (\Exception $exception){
            return response()->json(["data"=>'[]',"status"=>$exception->getMessage()]);
        }
    }
    public function sectionlist(Request $request,?string $classid = null)
    {
//        $sections = DB::select('select * from sections where classid = ?',[$classid]);
        $sections = sections::where("classid",$classid)->first();
//        dd($sections);
        return json_encode($sections);
    }
    public function saveconfig(Request $request)
    {
        $validator = Validator::make($request->data,[
            'classid' => 'required',
            'sectionid' => 'required',
            'workingdays'=>'required',
            'period'=>'required',
            'starttime'=>'required',
            'duration'=>'required',
            'breakscount'=>'',
            'breakperiod1'=>'',
            'breakduration1'=>'',
            'breakperiod2'=>'',
            'breakduration2'=>'',
            'breakperiod3'=>'',
            'breakduration3'=>'',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }
        try{
            $classdata = classes::where(['name'=>$request->data['classid']])->first();
            if(!$classdata)
            {
                $classdata =  new classes();
                $classdata->name = $request->data['classid'];
                $classdata->save();
            }
            $sectiondata = sections::where(['name'=>$request->data['sectionid'] ,'classid'=>$classdata->id])->first();
            if(empty($sectiondata))
            {
                $sectiondata = new sections();
                $sectiondata->name = $request->data['sectionid'];
                $sectiondata->classid = $classdata->id;
                $sectiondata->save();
//                $sectiondata = sections::create(['name'=>$request->data['sectionid'] ,'classid'=>$classdata->id]);
            }
            $config = configtable::where(['classid'=>$request->data['classid'],'sectionid'=>$request->data['sectionid']])->first();
            if(empty($config)) {
                $config = new configtable();
                $config->classid = $classdata->id;
                $config->sectionid = $sectiondata->id;
                $config->daysinweek = $request->data['workingdays'];
                $config->period = $request->data['period'];
                $config->starttime = $request->data['starttime'];
                $config->duration = $request->data['duration'];
                $breakperiod2 = $request->data['breakperiod2'] ?? '';
                $breakduration2 = $request->data['breakduration2'] ?? '';
                $breakperiod3 = $request->data['breakperiod3'] ?? '';
                $breakduration3 = $request->data['breakduration3'] ?? '';
                $breaksjson = json_encode([["breakperiod" => $request->data['breakperiod1'], "breakduration" => $request->data['breakduration1']], ["breakperiod" => $breakperiod2, "breakduration" => $breakduration2], ["breakperiod" => $breakperiod3, "breakduration" => $breakduration3]]);
                $config->break = $breaksjson;
                $config->save();
                $slottables = new tableslots();
                $slottables->configid=$config->id;
                $table = [];
                for ($i = 0; $i < $config->period+(int)$request->data['breakscount']; $i++) {
                    $row = [];
                    // Loop to create the cells in the row
                    for ($j = 0; $j < $config->daysinweek; $j++) {
                        $row[] = '<th>-</th>';
                    }
                    $table[] = $row;
                }
                $slottables->content=json_encode($table);
                $slottables->sircontent=json_encode($table);
                $slottables->save();
            }
            $slottables = tableslots::where(['configid'=>$config->id])->first();
            return response()->json(["data"=>$config,"status"=>200,"slot"=>$slottables]);
        }
        catch (\Exception $exception)
        {
            return response()->json(["data"=>'[]',"status"=>$exception->getMessage()]);
        }
    }
    public function loadconfig(Request $request)
    {
        $config = configtable::with('class','sec')->where(["id"=>$request->data])->first();
        return response()->json(["data"=>$config,"status"=>200]);
    }
}
