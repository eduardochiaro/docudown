@extends('master')

@section('content')
<div class="medium-3 columns">
  <h4>Overview</h4>
  {!! $tree !!}
</div>
<div class="medium-9 columns markdown">
  {!! $html !!}
</div>

@endsection
