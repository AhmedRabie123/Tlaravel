<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

     //reverse relationship one to one

    // public function rstudent(){

    //     return $this->belongsTo(Student::class, 'student_id');
        
    // }
}
