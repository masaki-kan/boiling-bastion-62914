<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable = [
      'grandfather','grandfather_img','grandfather_img_path',
      'grandmother','grandmother_img','grandmother_img_path',
      'father','father_img','father_img_path',
      'mother','mother_img','mother_img_path',
      'son_first_man','son_first_man_img','son_first_man_img_path',
      'son_first_woman','son_first_woman_img','son_first_woman_img_path',
      'son_second_man','son_second_man_img','son_second_man_img_path',
      'son_second_woman','son_second_woman_img','son_second_woman_img_path',
      'son_third_man','son_third_man_img','son_third_man_img_path',
      'son_third_woman','son_third_woman_img','son_third_woman_img_path',
    ];

    protected function image(){
      return $this->belongsTo('App\Models\Image');
    }
    protected function user(){
      return $this->belongsTo('App\Models\User');
    }
}
