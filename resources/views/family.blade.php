@extends('layouts/header')
@section('content')


<div class="user">
<div class="user_image">
@if( $user->img_name )
<img class="img-thumbnail" src="{{ $user->img_name_path }}">
@else
<label for="img_name"><img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}"></label>
@endif
</div>
<div class="user_content">
  <h4>{{ $user->name }}</h4>
  <h4>{{ $user->email }}</h4>
</div>
</div>

<div class="button_area">
<button style="display:block;"><a href="{{ route('userpage' , $user->id ) }}">プロフィール編集</a></button>
</div>

<div class="button_area">
@forelse( $user->names as $names )
@isset( $names->user_id )
<button style="display:none;"><a href="{{ route('familylist') }}">家族追加</a></button>
<button style="display:block;"><a href="{{ route('familycreate' , $names->user_id ) }}">家族編集</a></button>
@endisset
@empty
<button style="display:block;"><a href="{{ route('familylist') }}">家族追加</a></button>
@endforelse
</div>

@foreach( $user->names as $names )
<div class="family">
  <!--<span>ユーザーの家族</span>-->
@if( isset( $names->grandfather ) )
<div class="family_list">
<div class="list_img">
    @if( $names->grandfather_img )
  <img class="img-thumbnail" src="{{ $names->grandfather_img_path }}">
  @else
  <img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
  @endif
</div>
<div class="list_content">
  <h4>祖父</h4>
{{ $names->grandfather }}
</div>
</div>
@endif

@if( isset( $names->grandmother ) )
<div class="family_list">
<div class="list_img">
      @if( $names->grandmother_img )
  <img class="img-thumbnail" src="{{ $names->grandmother_img_path }}">
  @else
  <img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
  @endif
</div>
<div class="list_content">
  <h4>祖母</h4>
{{ $names->grandmother }}
</div>
</div>
@endif

@if( isset( $names->father ) )
<div class="family_list">
<div class="list_img">
        @if( $names->father_img )
  <img class="img-thumbnail" src="{{ $names->father_img_path }}">
  @else
  <img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
  @endif
</div>
<div class="list_content">
  <h4>父</h4>
{{ $names->father }}
</div>
</div>
@endif

@if( isset( $names->mother ) )
<div class="family_list">
<div class="list_img">
          @if( $names->mother_img )
  <img class="img-thumbnail" src="{{ $names->mother_img_path }}">
  @else
  <img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
  @endif
</div>
<div class="list_content">
  <h4>母</h4>
{{ $names->mother }}
</div>
</div>
@endif

@if( isset( $names->son_first_man ) )
<div class="family_list">
<div class="list_img">
    @if( $names->son_first_man_img )
  <img class="img-thumbnail" src="{{ $names->son_first_man_img_path }} ">
  @else
  <img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
  @endif
</div>
<div class="list_content">
  <h4>長男</h4>
{{ $names->son_first_man }}
</div>
</div>
@endif

@if( isset( $names->son_first_woman ) )
<div class="family_list">
<div class="list_img">
  @if( $names->son_first_woman_img )
  <img class="img-thumbnail" src="{{ $names->son_first_woman_img_path }}">
  @else
  <img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
  @endif
</div>
<div class="list_content">
  <h4>長女</h4>
  {{ $names->son_first_woman }}
</div>
</div>
@endif

@if( isset( $names->son_second_man ) )
<div class="family_list">
<div class="list_img">
  @if( $names->son_second_man_img )
  <img class="img-thumbnail" src="{{ $names->son_second_man_img_path }}">
  @else
  <img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
  @endif
</div>
<div class="list_content">
  <h4>次男</h4>
{{ $names->son_second_man }}
</div>
</div>
@endif

@if( isset( $names->son_second_woman ) )
<div class="family_list">
<div class="list_img">
    @if( $names->son_second_woman_img )
  <img class="img-thumbnail" src="{{ $names->son_second_woman_img_path }}">
  @else
  <img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
  @endif
</div>
<div class="list_content">
  <h4>次女</h4>
{{ $names->son_second_woman }}
</div>
</div>
@endif

@if( isset( $names->son_third_man ) )
<div class="family_list">
<div class="list_img">
  @if( $names->son_third_man_img )
<img class="img-thumbnail" src="{{ $names->son_third_man_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
</div>
<div class="list_content">
  <h4>三男</h4>
{{ $names->son_third_man }}
</div>
</div>
@endif

@if( isset( $names->son_third_woman ) )
<div class="family_list">
<div class="list_img">
    @if( $names->son_third_woman_img )
<img class="img-thumbnail" src="{{ $names->son_third_woman_img_path }}">
@else
<img class="img-thumbnail" src="{{ asset('/sample_images/user_icon.png') }}">
@endif
</div>
<div class="list_content">
  <h4>三女</h4>
{{ $names->son_third_woman }}
</div>
</div>
@endif
</div>
@endforeach

@endsection
