<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    // normal relationship one to one

    // public function rphone(){
    //     return $this->hasOne(phone::class);
    // }

    // relashinship one to many

    // public function rphone(){
  
    //     return $this->hasMany(phone::class);

    // }

   

    
}
