@extends('teacher.layouts.app')

@section('content')   <!-- page content -->
   <div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
     
    Teacher Dashboard
    {{$user->class}}
    </div>
  </div>
  <!-- /page content -->

  @endsection