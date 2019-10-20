@extends('master')

@section('title')
{{$title}}
@endsection

@section('content')
<div class="col-2 sidemenu">
  <h4>Overview</h4>
  {!! $tree !!}
</div>
<div class="col-10 markdown">
  {!! $html !!}
</div>

@endsection
