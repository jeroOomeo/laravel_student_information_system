<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //protected $table = 'courses';
    protected $fillable =['code','name','program_id'];
    use HasFactory;
    public function enrollee(){
        return $this->belongsTo(Enrollee::class);
    }
}
