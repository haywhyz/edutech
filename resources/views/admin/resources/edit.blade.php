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
              <h2>Edit  resource</h2>
              <div class="clearfix"></div>
            </div>
       
            
        <div class="col-md-6">
            <form  action="{{route('resources.update',$resources->id )}}" method="post">
            @csrf()
            @method('PUT')
                 <div class="form-group">
                     <label> Resource Name </label>
                     <input type="text" name="name" class="form-control" value="{{$resources->name}}">
                </div>

                  <div class="form-group">
                     <label> Subject Name </label>
                     <select class="form-control" name="subject_id">
                     @foreach ($subjects as $subjects )
                     <option value="{{$subjects->id}}">{{$subjects->name}} </option> 
                      @endforeach
                     </select>

                 

                      <div class="form-group">
                     <label> Curriculum Name </label>
                     <select class="form-control" name="curriculum_id">
                     @foreach ($curriculums as $curriculum )
                     <option value="{{$curriculum->id}}">{{$curriculum->name}} </option> 
                      @endforeach
                     </select>
          
                </div>

                 <div class="form-group">
                     <label> Class </label>
                     <select class="form-control" name="class">
                     <option value="ss1"> SS1 </option>
                     <option value="ss2"> SS2 </option>
                     <option value="ss3"> SS3 </option>
                     </select>
                </div>

                <div class="form-group">
                     <label> File </label>
                     <input type="file" name="file" class="form-control">
                </div>

                <div class "form-group">
                <input type="submit" name="submit" class="btn btn-primary btn-block">
                </div>
                

                </form>
        </div>
    
          </div>
         @endsection
