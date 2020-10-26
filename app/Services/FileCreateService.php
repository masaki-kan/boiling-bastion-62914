<?php

namespace App\Services;
use Auth;

class FileCreateService{

  public static function fileUpload($imageFile){

    //ファイル名(拡張子あり)を取得
    $fileNameWithExt = $imageFile->getClientOriginalName();
    //拡張子を除いたファイル名を取得
    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    //拡張子を取得
    $extension = mb_strtolower( $imageFile->getClientOriginalExtension() );
    //ファイル名.拡張子にする
    $fileNameToStore = Auth::user()->id.'_'.$fileName.'.'.$extension;
    //画像ファイルを取得
    $fileData = file_get_contents($imageFile->getRealPath());
    if ($extension === 'jpg'){
      $data_url = 'data:image/jpg;base64,'. base64_encode($fileData);
    }
    if ($extension === 'jpeg'){
      $data_url = 'data:image/jpg;base64,'. base64_encode($fileData);
    }
    if ($extension === 'png'){
      $data_url = 'data:image/png;base64,'. base64_encode($fileData);
    }
    if ($extension === 'gif'){
      $data_url = 'data:image/gif;base64,'. base64_encode($fileData);
    }

  $storelist = [ $fileNameToStore , $data_url ];

  return $storelist;
}
}
