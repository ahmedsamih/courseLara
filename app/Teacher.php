<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table="teachers";
    protected $primaryKey="id";
    protected $fillable = ["name", "date_of_birth", "mobile", "national_id", "user_id", "image_path"];

    public function user()
    {
        return $this->belongsTo("\App\User","user_id");
    }
    public function courses()
    {
        return $this->hasMany("\App\Course","teacher_id");
    }
}
