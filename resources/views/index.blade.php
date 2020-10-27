@extends('layouts.header')
@section('content')
<div class="user">
<div class="user_image">
<img class="img-thumbnail" src="{{ asset('/sample_images/logo.png') }}">
</div>
</div>
@include('include.calendar')
<div class="image_list sp">
  @if( $errors->has( 'file' ) )
  <p class="pick">{{ $errors->first('file') }}</p>
  @endif
  <ul>
    @foreach( $images as $image )
    @if( $image->user_id === Auth::user()->id )
    <li>
      <a href="{{ route('createpage' , $image->id ) }}"><img class="img-thumbnail" src="{{ $image->file_path }}">
      <span>{{ $image->title }}</span></a></li>
    @endif
    @endforeach
  </ul>
</div>

<div class="image_list pc">
  @if( $errors->has( 'file' ) )
  <p class="pick">{{ $errors->first('file') }}</p>
  @endif
  @foreach( $images as $image )
  @if( $image->user_id === Auth::user()->id )
  <div class="list">
    <p>
      <a href="{{ route('createpage' , $image->id ) }}"><img class="img-thumbnail" src="{{ $image->file_path }}">
      <span>{{ $image->title }}</span></a></p>
  </div>
  @endif
  @endforeach
</div>
@endsection
