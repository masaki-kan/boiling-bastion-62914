<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    protected $fillable = [ 'file' , 'title','file_path',
    'grandfather','grandmother','father','mather',
    'son_first_man','son_first_woman','son_second_man','son_second_woman',
    'son_third_man','son_third_woman',
  ];

        protected function user(){
          return $this->belongsTo('App\Models\User');
        }
        protected function names(){
          return $this->hasMany('App\Models\Name');
        }
        protected function people(){
          return $this->hasMany('App\Models\Person');
        }
}
