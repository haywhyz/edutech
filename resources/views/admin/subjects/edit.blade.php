@extends('admin.layouts.app')

@section('content')   <!-- page content -->
<div class="right_col" role="main">
  @if ($message = Session::get('success'))
  <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
  </div>
  @endif
  
      <div class="row">
        <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Subjects List</h2>
              <div class="clearfix"></div>
            </div>
       
            
        <div class="col-md-6">
            <form  action="{{route('subjects.update',$subjects->id )}}" method="post">
            @csrf()
            @method('PUT')
                <div class="form-group">
                     <label> Subject Name </label>
                     <input type="text" name="subject" class="form-control" value="{{$subjects->name}}">
                </div>

                <div class "form-group">
                <input type="submit" name="submit" class="btn btn-primary btn-block">
                </div>
                

                </form>
        </div>
    
          </div>
         @endsection
