<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
      'imgae_id',
      'grandfather',
      'grandmother',
      'father',
      'mother',
      'son_first_man',
      'son_first_woman',
      'son_second_man',
      'son_second_woman',
      'son_third_man',
      'son_third_woman',
    ];

    protected function image(){
      return $this->belongsTo( 'App\Models\Image' );
    }
    protected function names(){
      return $this->hasMany( 'App\Models\Name' );
    }

}
