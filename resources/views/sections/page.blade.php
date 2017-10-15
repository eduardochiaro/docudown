@extends('master')

@section('title')
{{$title}}
@endsection

@section('content')
<div class="medium-3 columns sidemenu">
  <h4>Overview</h4>
  {!! $tree !!}
</div>
<div class="medium-9 columns markdown">
  {!! $html !!}
</div>

@endsection
