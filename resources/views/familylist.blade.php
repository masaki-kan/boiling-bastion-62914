@extends('layouts/header')
@section('content')

  <div class="family">
    <span>家族構成</span>
    <p>空白でも可</p>
  <form action="{{ route('family_up') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" style="display:none;">
  <div class="family_list">
  <div class="list_img">
    <label for="grandfather_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="grandfather_img" value="" id="grandfather_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>祖父</h4>
  <input type="text" name="grandfather" value="{{ old('grandfather') }}">
  </div>
  </div>
  @if( $errors->has('grandmother_img') )
  <p>{{ $errors->first('grandmother_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="grandmother_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="grandmother_img" value="" id="grandmother_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>祖母</h4>
  <input type="text" name="grandmother" value="{{ old('grandmother') }}">
  </div>
  </div>
  @if( $errors->has('grandmother_img') )
  <p>{{ $errors->first('grandmother_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="father_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="father_img" value="" id="father_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>父</h4>
  <input type="text" name="father" value="{{ old('father') }}">
  </div>
  </div>
  @if( $errors->has('father_img') )
  <p>{{ $errors->first('father_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="mother_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="mother_img" value="" id="mother_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>母</h4>
  <input type="text" name="mother" value="{{ old('mother') }}">
  </div>
  </div>
  @if( $errors->has('mother_img') )
  <p>{{ $errors->first('mother_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="son_first_man_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="son_first_man_img" value="" id="son_first_man_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>長男</h4>
  <input type="text" name="son_first_man" value="{{ old('son_first_man') }}">
  </div>
  </div>
  @if( $errors->has('son_first_man_img') )
  <p>{{ $errors->first('son_first_man_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="son_first_woman_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="son_first_woman_img" value="" id="son_first_woman_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>長女</h4>
  <input type="text" name="son_first_woman" value="{{ old('son_first_woman') }}">
  </div>
  </div>
  @if( $errors->has('son_first_woman_img') )
  <p>{{ $errors->first('son_first_woman_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="son_second_man_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="son_second_man_img" value="" id="son_second_man_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>次男</h4>
  <input type="text" name="son_second_man" value="{{ old('son_second_man') }}">
  </div>
  </div>
  @if( $errors->has('son_second_man_img') )
  <p>{{ $errors->first('son_second_man_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="son_second_woman_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="son_second_woman_img" value="" id="son_second_woman_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>次女</h4>
  <input type="text" name="son_second_woman" value="{{ old('son_second_woman') }}">
  </div>
  </div>
  @if( $errors->has('son_second_woman_img') )
  <p>{{ $errors->first('son_second_woman_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="son_third_man_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="son_third_man_img" value="" id="son_third_man_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>三男</h4>
  <input type="text" name="son_third_man" value="{{ old('son_third_man') }}">
  </div>
  </div>
  @if( $errors->has('son_third_man_img') )
  <p>{{ $errors->first('son_third_man_img') }}</p>
  @endif
  <div class="family_list">
  <div class="list_img">
    <label for="son_third_woman_img"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
    <input type="file" name="son_third_woman_img" value="" id="son_third_woman_img" style="display:none;">
  </div>
  <div class="list_content">
  <h4>三女</h4>
  <input type="text" name="son_third_woman" value="{{ old('son_third_woman') }}">
  </div>
  </div>
  @if( $errors->has('son_third_woman_img') )
  <p>{{ $errors->first('son_third_woman_img') }}</p>
  @endif
  <div class="button_area">
  <label class="btn btn-primary button" for="submit">追加</label>
  <input type="submit" value="" id="submit" style="display:none;">
  </div>

  </form>
  </div>
@endsection
