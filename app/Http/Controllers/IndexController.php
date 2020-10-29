<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;
use App\Models\Image;
use App\Models\User;
use App\Models\Person;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;
use App\Services\FileCreateService;
use App\Services\ImageUploadServise;
use Illuminate\Support\Facades\Validator;
use App\Facades\Calendar;
use App\Services\CalendarService;
use \InterventionImage;

class IndexController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      $images = Image::all();
      return view( 'index' , [ 'images' => $images ] , [
          // 'weeks'         => $this->service->getWeeks(),
          'weeks'         => Calendar::getWeeks(),
          'month'         => Calendar::getMonth(),
          'prev'          => Calendar::getPrev(),
          'next'          => Calendar::getNext(),
      ] );
    }

    public function search( $month ){
      $images = Image::where( 'created_at' , 'Like' , $month.'%' )->get();
      return view( 'search'  , [ 'images'  => $images] ,
      [
          // 'weeks'         => $this->service->getWeeks(),
          'weeks'         => Calendar::getWeeks(),
          'month'         => Calendar::getMonth(),
          'prev'          => Calendar::getPrev(),
          'next'          => Calendar::getNext(),
      ]
    );
    }

    public function createpage($id){
      $images = Image::where( 'id' , $id )->first();
      return view( 'create' , [ 'images' => $images ]);
    }

    public function image_up( Request $request ){
      $imageValidator = Validator::make( $request->all() ,
      [
        'file' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF'
      ]);
     if( $imageValidator->fails() ){
       return redirect()->back()->withErrors($imageValidator)->withInput();
     }
      $images = new Image;
      $images->user_id = Auth::user()->id;
      if( isset( $request->file ) ){
        $image = $request->file;
        $inputImage = imageUploadServise::inputSelect($image);
        list( $image_fileName , $data_url ) = $inputImage;
        $request->file('file')->storeAs( '/public/images/' , $image_fileName );
        //$resizeImage = InterventionImage::make($image)->resize( 300 , 300 )->save( storage_path(). '/app/public/images/' . $image_fileName );
        //webにupするときはこっち
        $images->file = $image_fileName;
        $images->file_path = $data_url;
        $images->save();
        return redirect()->back();
      }else{
        return redirect()->back();
      }
    }


    public function title_up( Request $request ){
      $validata = Validator::make( $request->all() ,
      [
        'title' => 'required|min:4|max:30',
      ],
      [
        'title.required' => '4文字以上30文字内',
      ]);
        if( $validata->fails() ){
          return redirect()->back()->withErrors($validata)->withInput();
        }
      $title = Image::find($request->id);
      $title->title = $request->title;
      $title->user_id = $request->user_id;
      $title->grandfather = $request->grandfather;
      $title->grandmother = $request->grandmother;
      $title->father = $request->father;
      $title->mother = $request->mother;
      $title->son_first_man = $request->son_first_man;
      $title->son_first_woman = $request->son_first_woman;
      $title->son_second_man = $request->son_second_man;
      $title->son_second_woman = $request->son_second_woman;
      $title->son_third_man = $request->son_third_man;
      $title->son_third_woman = $request->son_third_woman;
      $title->save();
      session()->flash('success' , '更新しました。');
      return redirect()->back();
    }

    public function family( $id ){
       $user = User::find( $id );
      return view( 'family' , ['user' => $user]);
    }

    public function family_up( Request $request ){
      $validataUser = Validator::make( $request->all() ,
      [
        'grandfather_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'grandmother_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'father_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'mother_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_first_man_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_first_woman_img' => 'image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_second_man_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_second_woman_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_third_man_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_third_woman_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
      ],
    );
        if( $validataUser->fails() ){
          return redirect()->back()->withErrors($validataUser)->withInput();
        }
      $name = new Name;
      $name->user_id = $request->user_id;
      $name->grandfather = $request->grandfather;
      $name->grandmother = $request->grandmother;
      $name->father = $request->father;
      $name->mother = $request->mother;
      $name->son_first_man = $request->son_first_man;
      $name->son_first_woman = $request->son_first_woman;
      $name->son_second_man = $request->son_second_man;
      $name->son_second_woman = $request->son_second_woman;
      $name->son_third_man = $request->son_third_man;
      $name->son_third_woman = $request->son_third_woman;

      if( isset( $request->grandfather_img ) ){
      $imageFile = $request->grandfather_img;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('grandfather_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $name->grandfather_img = $fileNameToStore;
      $name->grandfather_img_path = $data_url;
      //$name->grandfather_img = $fileNameToStore;
    }
    if( isset( $request->grandmother_img ) ){
      $imageFile =  $request->grandmother_img ;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('grandmother_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      //$name->grandfather_img = $data_url;
      $name->grandmother_img_path = $data_url;
      $name->grandmother_img = $fileNameToStore;
    }
    if( isset( $request->father_img ) ){
      $imageFile =  $request->father_img ;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('father_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $name->father_img = $fileNameToStore;
      $name->father_img_path = $data_url;
      //$name->father_img = $fileNameToStore;
    }
    if( isset( $request->mother_img ) ){
      $imageFile =  $request->mother_img;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('mother_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      //$name->grandfather_img = $data_url;
      $name->mother_img_path = $fileNameToStore;
      $name->mother_img = $fileNameToStore;
    }
    if( isset( $request->son_first_man_img ) ){
      $imageFile =  $request->son_first_man_img;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_first_man_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $name->son_first_man_img = $fileNameToStore;
      $name->son_first_man_img_path = $data_url;
      //$name->son_first_man_img = $fileNameToStore;
    }
    if( isset( $request->son_first_woman_img ) ){
      $imageFile =  $request->son_first_woman_img;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_first_woman_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $name->son_first_woman_img = $fileNameToStore;
      $name->son_first_woman_img_path = $data_url;
      //$name->son_first_woman_img = $fileNameToStore;
    }
    if( isset( $request->son_second_man_img ) ){
      $imageFile =  $request->son_second_man_img;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_second_man_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $name->son_second_man_img = $fileNameToStore;
      $name->son_second_man_img_path = $data_url;
      //$name->son_second_man_img = $fileNameToStore;
    }
    if( isset( $request->son_second_woman_img ) ){
      $imageFile =  $request->son_second_woman_img;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_second_woman_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $name->son_second_woman_img = $fileNameToStore;
      $name->son_second_woman_img_path = $data_url;
      //$name->son_second_woman_img = $fileNameToStore;
    }
    if( isset( $request->son_third_man_img ) ){
      $imageFile =  $request->son_third_man_img;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_third_man_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $name->son_third_man_img = $fileNameToStore;
      $name->son_third_man_img_path = $data_url;
      //$name->son_third_man_img = $fileNameToStore;
    }
    if( isset( $request->son_third_woman_img ) ){
      $imageFile =  $request->son_third_woman_img;
      $storelist = FileUploadServices::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_third_woman_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $name->son_third_woman_img = $fileNameToStore;
      $name->son_third_woman_img_path = $data_url;
      //$name->son_third_woman_img = $fileNameToStore;
    }
      $name->save();
      return redirect()->route('family', Auth::user()->id);
    }

    public function familylist(){
      return view( 'familylist' );
    }
    public function familycreate($id){
      $create = Name::where( 'user_id' , $id )->first();
      return view( 'familycreate' , [ 'create' => $create ] );
    }
    public function familyupdata( Request $request){
      $validataUser = Validator::make( $request->all() ,
      [
        'grandfather_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'grandmother_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'father_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'mother_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_first_man_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_first_woman_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_second_man_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_second_woman_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_third_man_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
        'son_third_woman_img' => 'file','image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
      ],
    );
        if( $validataUser->fails() ){
          return redirect()->back()->withErrors($validataUser)->withInput();
        }
      $updata = Name::find( $request->id );
      $updata->user_id = $request->user_id;
      $updata->grandfather = $request->grandfather;
      $updata->grandmother = $request->grandmother;
      $updata->father = $request->father;
      $updata->mother = $request->mother;
      $updata->son_first_man = $request->son_first_man;
      $updata->son_first_woman = $request->son_first_woman;
      $updata->son_second_man = $request->son_second_man;
      $updata->son_second_woman = $request->son_second_woman;
      $updata->son_third_man = $request->son_third_man;
      $updata->son_third_woman = $request->son_third_woman;

      if( isset( $request->grandfather_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->grandfather_img);
      $imageFile = $request->grandfather_img;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('grandfather_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->grandfather_img = $fileNameToStore;
      $updata->grandfather_img_path = $data_url;
      //$updata->grandfather_img = $fileNameToStore;
    }
    if( isset( $request->grandmother_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->grandmother_img);
      $imageFile =  $request->grandmother_img ;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('grandmother_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->grandmother_img = $fileNameToStore;
      $updata->grandmother_img_path = $data_url;
      //$updata->grandmother_img = $fileNameToStore;
    }
    if( isset( $request->father_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->father_img);
      $imageFile =  $request->father_img ;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('father_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->father_img = $fileNameToStore;
      $updata->father_img_path = $data_url;
      //$updata->father_img = $fileNameToStore;
    }
    if( isset( $request->mother_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->mother_img);
      $imageFile =  $request->mother_img;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('mother_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->mother_img = $fileNameToStore;
      $updata->mother_img_path = $data_url;
      //$updata->mother_img = $fileNameToStore;
    }
    if( isset( $request->son_first_man_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->son_first_man_img);
      $imageFile =  $request->son_first_man_img;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_first_man_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->son_first_man_img = $fileNameToStore;
      $updata->son_first_man_img_path = $data_url;
      //$updata->son_first_man_img = $fileNameToStore;
    }
    if( isset( $request->son_first_woman_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->son_first_woman_img);
      $imageFile =  $request->son_first_woman_img;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_first_woman_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->son_first_woman_img = $fileNameToStore;
      $updata->son_first_woman_img_path = $data_url;
      //$updata->son_first_woman_img = $fileNameToStore;
    }
    if( isset( $request->son_second_man_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->son_second_man_img);
      $imageFile =  $request->son_second_man_img;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_second_man_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->son_second_man_img = $fileNameToStore;
      $updata->son_second_man_img_path = $data_url;
      //$updata->son_second_man_img = $fileNameToStore;
    }
    if( isset( $request->son_second_woman_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->son_second_woman_img);
      $imageFile =  $request->son_second_woman_img;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_second_woman_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->son_second_woman_img = $fileNameToStore;
      $updata->son_second_woman_img_path = $data_url;
      //$updata->son_second_woman_img = $fileNameToStore;
    }
    if( isset( $request->son_third_man_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->son_third_man_img);
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_third_man_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->son_third_man_img = $fileNameToStore;
      $updata->son_third_man_img_path = $data_url;
      //$updata->son_third_man_img = $fileNameToStore;
    }
    if( isset( $request->son_third_woman_img ) ){
      Storage::disk('public')->delete('/user/' . $updata->son_third_woman_img);
      $imageFile =  $request->son_third_woman_img;
      $storelist = FileCreateService::fileUpload($imageFile);
      list($fileNameToStore,$data_url) = $storelist;
      //ユーザーid_ファイル名.拡張子で保存
      $request->file('son_third_woman_img')->storeAs('public/user', $fileNameToStore);
      //webにupするときはこっち
      $updata->son_third_woman_img = $fileNameToStore;
      $updata->son_third_woman_img_path = $data_url;
      //$updata->son_third_woman_img = $fileNameToStore;
    }
      $updata->save();
      return redirect()->route('family', Auth::user()->id);
    }

    public function userpage($id){
      $user = User::where('id' , $id)->first();
      return view( 'userpage' , [ 'user' => $user ]);
    }

    public function userup( Request $request ){
      $validataUp = Validator::make( $request->all() ,
      [
        'img_name' => 'image','mimes:jpeg,JPEG,png,PNG,jpg,JPG,heic,HEIC,heif,HEIF,gif,GIF',
      ],
    );
        if( $validataUp->fails() ){
          return redirect()->back()->withErrors($validataUp)->withInput();
        }
      $userimages = User::find( $request->id );
      if( isset( $request->img_name ) ){
        Storage::disk('public')->delete('/user_images/' . $userimages->img_name);
        $userImageFile =  $request->img_name;
        //ファイル名(拡張子あり)を取得
        $userNameWithExt = $userImageFile->getClientOriginalName();
        //拡張子を除いたファイル名を取得
        $userImageName = pathinfo($userNameWithExt, PATHINFO_FILENAME);
        //拡張子を取得
        $userExtension = mb_strtolower( $userImageFile->getClientOriginalExtension() );
        //ファイル名.拡張子にする
        $userFileNameToStore = Auth::user()->id.'_'.Auth::user()->name.'_'.$userImageName.'.'.$userExtension;
        //ユーザーid_ファイル名.拡張子で保存
        $request->file('img_name')->storeAs('public/user_images', $userFileNameToStore);
        //画像ファイルを取得
        $userFileData = file_get_contents($userImageFile->getRealPath());
        if ($userExtension === 'jpg'){
          $user_data_url = 'data:image/jpg;base64,'. base64_encode($userFileData);
        }
        if ($userExtension === 'jpeg'){
          $user_data_url = 'data:image/jpg;base64,'. base64_encode($userFileData);
        }
        if ($userExtension === 'png'){
          $user_data_url = 'data:image/png;base64,'. base64_encode($userFileData);
        }
        if ($userExtension === 'gif'){
          $user_data_url = 'data:image/gif;base64,'. base64_encode($userFileData);
        }
        //webにupするときはこっち
        $userimages->img_name = $userFileNameToStore;
        $userimages->img_name_path = $user_data_url;
        //$userimages->img_name = $userFileNameToStore;
    }
    $userimages->save();
    return redirect()->back();
  }

  public function delete($id){
    $imageDelete = Image::where( 'id' , $id )->first();
    Storage::disk('public')->delete('/images/' . $imageDelete->file);
    Image::where( 'id' , $id )->delete();
    $imageDelete->save();
    return redirect()->route('home');


  }
}
