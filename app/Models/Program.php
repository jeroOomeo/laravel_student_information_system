<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //protected $table = "programs";
    protected $fillable =['name','abbreviation', 'college_id'];
    use HasFactory;
    public function enrollee(){
        return $this->belongsTo(Enrollee::class);
    }
}
