<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //protected $table = "colleges";
    protected $fillable =['name','acronym'];
    use HasFactory;
    public function enrollee(){
        return $this->belongsTo(Enrollee::class);
    }
}
