<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table="courses";
    protected $primaryKey="id";
    protected $fillable=["name","description","skills","language","hours_no","teacher_id","image_path"];

    public function teacher(){
        return $this->belongsTo("App\Teacher","user_id");
    }
    public function course(){
        return $this->hasOne("App\Teacher","user_id");
    }
}
