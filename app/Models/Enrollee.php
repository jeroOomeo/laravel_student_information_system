<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollee extends Model
{
    //protected $table = 'enrollees';
    protected $fillable = ['first_name','last_name','id_number','college_id','program_id','course_id'];
    use HasFactory;
    public function college(){
        return $this->hasOne(College::class);
    }
    public function program(){
        return $this->hasOne(Program::class);
    }
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
