@extends('layouts.header')
@section('content')

<div class="user">
<div class="user_image">
  <div class="family">
  <form action="{{ route('userup') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $user->id }}" style="display:none;">
  <div class="list_img">
  @if( $user->img_name )
    <label for="img_name"><img class="img-thumbnail" src="{{ $user->img_name_path }}"></label>
    @else
    <label for="img_name"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
  @endif
    <input type="file" name="img_name" value="" id="img_name" style="display:none;">
  </div>

  <div class="button_area">
  <label class="btn btn-primary button" for="submit">追加</label>
  <input type="submit" value="" id="submit" style="display:none;">
  </div>
  </form>
  @if( $errors->has('img_name') )
  <p>{{ $errors->first('img_name') }}</p>
  @endif
</div>
</div>
<div class="user_content">
  <h4>{{ $user->name }}</h4>
  <h4>{{ $user->email }}</h4>
</div>
</div>

@endsection
