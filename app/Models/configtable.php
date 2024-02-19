<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class configtable extends Model
{
    use HasFactory;
    public function class()
    {
        return $this->hasOne(classes::class,'id','classid');
    }
    public function sec()
    {
        return $this->hasOne(sections::class,'id','sectionid');
    }
}
