@include('cdn')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        .error
        {
            color:red;
        }
        .btn_modal {
            border: 1px solid #1a202c;
            color: white;
            background-color: #1a202c;
        }

        .btn_modal:hover {
            color: #1a202c;
            background-color: white;
            border: 1px solid #1a202c;
        }

        .ms-auto {
            margin-left: 0 !important;
        }
    </style>
    {{--  model  --}}
    <div class="modal fade" id="modalconfigtable" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Configure Table</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form id="configtabledata" method="post">
                        <div class="mb-3">
                            <label for="classid" class="form-label">Class Name</label>
                            <input type="text" class="form-control" id="classid" name="classid" readonly value="">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="sectionid" class="form-label">Section Name</label>
                            <input type="text" class="form-control" id="sectionid" name="sectionid" readonly value="">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="workingdays" class="form-label">Working Days</label>
                            <input type="number" class="form-control" min="1" max="7" id="workingdays"
                                   name="workingdays" aria-describedby="emailHelp">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="period" class="form-label">Period</label>
                            <input type="number" class="form-control" min="1" id="period" name="period"
                                   aria-describedby="emailHelp">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="starttime" class="form-label">Starting Time</label>
                            <input type="time" class="form-control" id="starttime" name="starttime"
                                   aria-describedby="emailHelp">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration(minutes only)</label>
                            <input type="number" class="form-control" min="1" id="duration" name="duration"
                                   aria-describedby="emailHelp">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="breakscount" class="form-label">No. of Breaks</label>
                            <select id="breakscount" name="breakscount" class="form-select">
                                <option selected disabled value="-">--Select No of Breaks--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div id="breakcontent">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn_modal" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn_modal" id="saveconfigbtn">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    {{--    --}}
    <div class="modal fade" id="modalconfigtableview" data-id="" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Configure Table</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form id="configtabledata" method="post">
                        <div class="mb-3">
                            <label for="classid" class="form-label">Class Name</label>
                            <input type="text" class="form-control" id="classidview" name="classid" readonly value="">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="sectionid" class="form-label">Section Name</label>
                            <input type="text" class="form-control" id="sectionidview" name="sectionidview" readonly value="">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="workingdays" class="form-label">Working Days</label>
                            <input type="number" class="form-control" min="1" max="7" id="workingdaysview"
                                   name="workingdays" aria-describedby="emailHelp">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="period" class="form-label">Period</label>
                            <input type="number" class="form-control" min="1" id="periodview" name="periodview"
                                   aria-describedby="emailHelp">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="starttime" class="form-label">Starting Time</label>
                            <input type="time" class="form-control" id="starttimeview" name="starttimeview"
                                   aria-describedby="emailHelp">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration(minutes only)</label>
                            <input type="number" class="form-control" min="1" id="durationview" name="durationview"
                                   aria-describedby="emailHelp">
                            {{--                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        </div>
                        <div class="mb-3">
                            <label for="breakperiod1" class="form-label">Break 1: After Period</label>
                            <input type="number" class="form-control" min="1" id="breakperiod1view" name="breakperiod1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration of Break(mins)</label>
                            <input type="number" class="form-control" min="1" id="breakduration1view" name="breakduration1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="breakperiod2" class="form-label">Break 2: After Period</label>
                            <input type="number" class="form-control" min="1" id="breakperiod2" name="breakperiod2" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration of Break(mins)</label>
                            <input type="number" class="form-control" min="1" id="breakduration2" name="breakduration2" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="breakperiod3" class="form-label">Break 3: After Period</label>
                            <input type="number" class="form-control" min="1" id="breakperiod3" name="breakperiod3" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration of Break(mins)</label>
                            <input type="number" class="form-control" min="1" id="breakduration3" name="breakduration3" aria-describedby="emailHelp">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn_modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-white py-5 mt-5">
        <form method="post">
            <select id="class" placeholder="Select Class"></select>
            <select id="sections" placeholder="Select Section" class="mt-3"></select>
        </form>
        <div class="flex justify-end">
            <button id="submit_class_section"
                    class="btn btn_modal">
                Submit
            </button>
        </div>
    </div>
    <div id="messagenodata" class="container bg-white">
        <div class="mt-3 py-5 text-center">
            No Data Selected
        </div>
    </div>
    <div id="generatetimetable" class="container bg-white d-none">
        <div class="mt-3 py-5 ">
            <h1 class="text-center pb-3" style="font-size: 30px; font-weight: 700">Class - Section</h1>
            <table class="table table-bordered text-center">
                <thead id="timetable-header">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>
                    <th scope="col">Thursday</th>
                    <th scope="col">Friday</th>
                    <th scope="col">Saturday</th>
                </tr>
                </thead>
                <tbody id="timetable-body">
{{--                <tr>--}}
{{--                    <th scope="col" rowspan="2">8:00-9:00</th>--}}
{{--                    <td>Laraval1</td>--}}
{{--                    <td>Laraval2</td>--}}
{{--                    <td>Laraval3</td>--}}
{{--                    <td>Laraval4</td>--}}
{{--                    <td>Laraval5</td>--}}
{{--                    <td>Laraval6</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th scope="col" rowspan="2">9:00-10:00</th>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th scope="col" rowspan="2">10:00-10:30</th>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th scope="col" rowspan="2">10:30-11:30</th>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th scope="col" rowspan="2">11:30-12:30</th>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                    <td>Laraval</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                    <td>Tushar Sir</td>--}}
{{--                </tr>--}}
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn_modal" data-bs-toggle="modal" data-bs-target="#modalconfigtableview">
                    Check Config Table
                </button>
            </div>
            <!-- Modal -->
        </div>
    </div>
</x-app-layout>
<script>
    function formattime(time)
    {
        var string = ('0' + time.getHours()).slice(-2) + ':' + ('0' + time.getMinutes()).slice(-2);
        return string;
    }
    function constructtable(data,slots)
    {
        $('#modalconfigtableview').attr('data-id',data.id);
        //Constructed Header
        $('#generatetimetable').removeClass('d-none');
        $('#messagenodata').addClass('d-none');

        var week = ['Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday','Sunday'];
        var timesection = [];
        var header_content='<tr><th scope="col">#</th>';
        var content=JSON.parse(slots.content);
        var sir_content=JSON.parse(slots.sircontent);
        for(var i=0;i<parseInt(data.daysinweek);i++)
        {
            header_content += '<th scope="col">'+week[i]+'</th>';
        }
        header_content += '</tr>';
        $('#timetable-header').html(header_content);
        var starttime = new Date();
        var temptimeString = data.starttime.split(':');
        starttime.setHours(temptimeString[0]);
        starttime.setMinutes(temptimeString[1]);
        timesection.push(formattime(starttime));
        var breakcounter = [];
        var breakjson = JSON.parse(data.break);
        var counter=0;
        for(var i=1;i<parseInt(data.period)+1;i++)
        {
            starttime.setMinutes(starttime.getMinutes() + parseInt(data.duration));
            timesection.push(formattime(starttime));
            for(var j=0;j<breakjson.length;j++)
            {
                if(i === parseInt(breakjson[j]['breakperiod']))
                {
                    switch (counter)
                    {
                        case 0:
                            breakcounter.push(i);
                            break;
                        case 1:
                            breakcounter.push(i+1);
                            break;
                        case 2:
                            breakcounter.push(i+2);
                            break;
                    }
                    counter++;
                    starttime.setMinutes(starttime.getMinutes() + parseInt(breakjson[j]['breakduration']));
                    timesection.push(formattime(starttime));
                }
            }
        }
        var body_content = '';
        for(var i =0;i<timesection.length-1;i++)
        {
            if(breakcounter.includes(i))
            {
                body_content += '<tr>'+ '<th scope="col" >'+timesection[i] +'-'+ timesection[i+1]+'</th>' + '<th colspan="'+data.daysinweek+'">Break</th>' + '</tr>';
            }
            else{
                body_content += '<tr>'+ '<th scope="col" rowspan="2">'+timesection[i] +'-'+ timesection[i+1]+'</th>' + content[i] + '</tr>' + '<tr>' + sir_content[i] + '</tr>';
            }

        }
        $('#timetable-body').html(body_content);
        // console.log(timesection,data);
    }
    $(document).ready(function () {
        var classes = new TomSelect('#class', {
            create: true,
            closeAfterSelect: true,
            valueField: 'id',
            labelField: 'name',
            searchField: ['name'],
            maxItems: 1,
            onChange: function () {
                sections.clear();
                sections.clearOptions();
                sections.refreshOptions(false);
                sections.focus();
            },
            onFocus: function (query, callback) {
                var self = this;
                if (self.loading > 1) {
                    callback();
                    return;
                }
                var url = '{{route('classlist')}}';
                fetch(url)
                    .then(response => response.json())
                    .then(json => {
                        if (json.length === 0) {
                            this.addOption({
                                id: '',
                                name: 'No result found: Type here to create new class',
                                disabled: true
                            });
                        } else {
                            this.addOption(json);
                        }
                        this.open();
                    }).catch(() => {
                    callback();
                });

            },
            render: {
                option: function (item, escape) {
                    return `<div class="py-2 d-flex">
					 		<div class="ms-auto">${escape(item.name)}</div>
						</div>`;
                },
                no_results: function (data, escape) {
                    return '<div class="no-results">No result found: Type here to create new class</div>';
                },
            }
        });

        var sections = new TomSelect('#sections', {
            create: true,
            closeAfterSelect: true,
            valueField: 'id',
            labelField: 'name',
            searchField: ['name'],
            maxItems: 1,
            onFocus: function (query, callback) {
                var self = this;
                if (self.loading > 1) {
                    callback();
                    return;
                }
                var classid = $('#class').val();
                var url = '{{route('sectionlist',[''])}}' + '/' + classid;
                fetch(url)
                    .then(response => response.json())
                    .then(json => {
                        if (json.length === 0) {
                            this.addOption({
                                id: '',
                                name: 'No result found: Type here to create new section',
                                disabled: true
                            });
                        } else {
                            this.addOption(json);
                        }
                        this.open();
                    }).catch(() => {
                    callback();
                });

            },
            render: {
                option: function (item, escape) {
                    return `<div class="py-2 d-flex">
					 		<div class="ms-auto">${escape(item.name)}</div>
						</div>`;
                },
                no_results: function (data, escape) {
                    return '<div class="no-results">No result found: Type here to create new section</div>';
                },
            }
        });
        $('#submit_class_section').on('click', function () {
            event.preventDefault();
            var classid = $('#class').val();
            var sectionid = $('#sections').val();
            if (classid.length == 0) {
                toastr.warning("please select class");
                classes.clear();
                classes.clearOptions();
                classes.refreshOptions(false);
                classes.focus();
                classes.open;
                return;
            }
            if (sectionid.length == 0) {
                toastr.warning("please select section");
                sections.clear();
                sections.clearOptions();
                sections.refreshOptions(false);
                sections.focus();
                classes.open;
                return;
            }
            $.ajax({
                url: '{{route('checkconfig')}}',
                type: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "classid": classid,
                    "sectionid": sectionid
                },
                dataType: 'json',
                success: function (response) {
                    if (response.data == null || response.data.length === 0) {
                        toastr.info("No Config is Set, Set Here");
                        var classtext = $('#class option:selected').text();
                        var sectiontext = $('#sections option:selected').text();
                        $('#classid').val(classtext);
                        $('#sectionid').val(sectiontext);
                        //model open
                        $('#modalconfigtable').modal('show');
                    }
                    else{
                        constructtable(response.data,response.slot);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $('#breakscount').on('change', function () {
            event.preventDefault();
            var breakcount = $(this).val();
            var content=``;
            for(var i=1;i<=breakcount;i++)
            {
                content += `<div class="mb-3">
                                <label for="breakperiod`+i+`" class="form-label">Break `+i+`: After Period</label>
                                <input type="number" class="form-control" min="1" id="breakperiod`+i+`" name="breakperiod`+i+`" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration of Break(mins)</label>
                                <input type="number" class="form-control" min="1" id="breakduration`+i+`" name="breakduration`+i+`" aria-describedby="emailHelp">
                            </div>`
            }
            $('#breakcontent').html('');
            $('#breakcontent').html(content);
        });
        $('#configtabledata').validate({
            rules:{
                classid:{
                    required:true
                },
                sectionid:{
                    required:true
                },
                workingdays:{
                    required:true,
                    rangelength:[1,6]
                },
                period:{
                    required:true,
                    rangelength:[1,14]
                },
                starttime:{
                    required:true,
                },
                duration:{
                    required:true,
                },
                breakscount:{
                    required:true,
                },
                breakperiod1:{
                    required:true,
                },
                breakduration1:{
                    required:true,
                },
                breakperiod2:{
                    required:true,
                },
                breakduration2:{
                    required:true,
                },
                breakperiod3:{
                    required:true,
                },
                breakduration3:{
                    required:true,
                },

            },

        });
        $('#saveconfigbtn').on('click',function(){
           event.preventDefault();
             var bool_check  = $('#configtabledata').valid();
             if(!bool_check)
             {
                 toastr.error("Check the Form for Errors.");
                 return;
             }
             var formdata = $('#configtabledata').serializeArray();
            var formattedData = {};

            formdata.forEach(function(item) {
                formattedData[item.name] = item.value;
            });
             $.ajax({
                 url:'{{route('saveconfig')}}',
                 type:'POST',
                 contentType:'application/json',
                 processData: false,
                 dataType:'json',
                 data:JSON.stringify({
                    '_token':'{{csrf_token()}}',
                    'data':formattedData
                 }),
                 success:function(response)
                 {
                    if(response.status === 200)
                    {
                        $('#modalconfigtable').modal('hide');
                        constructtable(response.data,response.slot);

                    }
                    else{
                        toastr.error("Error in retriving data");
                    }
                 },
                 error:function(xhr,status,error)
                 {
                     console.error(error);
                 }
             });


        });
        $('#modalconfigtableview').on('shown.bs.modal', function (e) {
            var configid = $(this).attr('data-id');
            $.ajax({
                url:'{{route('loadconfig')}}',
                type:'POST',
                contentType:'application/json',
                processData: false,
                dataType:'json',
                data:JSON.stringify({
                    '_token':'{{csrf_token()}}',
                    'data':configid
                }),
                success:function(response)
                {
                    if(response.status === 200)
                    {
                        console.log(response.data);
                        $('#classidview').val(response.data['class']['name']);
                        $('#sectionidview').val(response.data['sec']['name']);
                        $('#workingdaysview').val(response.data['daysinweek']);
                        $('#periodview').val(response.data['period']);
                        $('#starttimeview').val(response.data['starttime']);
                        $('#durationview').val(response.data['duration']);
                        var breaks = JSON.parse(response.data['break']);
                        for(var i = 0;i<breaks.length;i++)
                        {

                            $('#breakperiod'+i+'view').val(breaks[i]['breakperiod']);
                            $('#breakduration'+i+'view').val(breaks[i]['breakduration']);
                        }
                    }
                    else{
                        toastr.error("Unable to fetch data");
                    }
                },
                error:function(xhr,status,error)
                {
                    console.error(error);
                }
            });
        });
    });
</script>
