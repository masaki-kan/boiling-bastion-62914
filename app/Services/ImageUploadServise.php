<?php

namespace App\Services;

use Auth;
use Illuminate\Http\Request;

class ImageUploadServise{

  public static function inputSelect($image){
    $image_name = $image->getClientOriginalName();
    //拡張子を除いたファイル名を取得
    $fileName = pathinfo($image_name, PATHINFO_FILENAME);
    $image_ext = mb_strtolower( $image->getClientOriginalExtension() );
    $image_fileName = Auth::user()->id.'_'.$fileName.'.'.$image_ext;
    //画像ファイルpathを取得
    $fileData = file_get_contents($image->getRealPath());
    if ($image_ext === 'jpg'){
      $data_url = 'data:image/jpg;base64,'. base64_encode($fileData);
    }
    if ($image_ext === 'jpeg'){
      $data_url = 'data:image/jpg;base64,'. base64_encode($fileData);
    }
    if ($image_ext === 'png'){
      $data_url = 'data:image/png;base64,'. base64_encode($fileData);
    }
    if ($image_ext === 'gif'){
      $data_url = 'data:image/gif;base64,'. base64_encode($fileData);
    }
    

    $inputImage = [ $image_fileName , $data_url ];

    return $inputImage;
  }

}
