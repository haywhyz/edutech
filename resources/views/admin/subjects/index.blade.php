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
            @php($no=0)
            @if(count($subjects) > 0)
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date Added</th>
                    <th> Operations </th
                  </tr>
                </thead>

                <tbody>
                  <?php  $no=1; ?>
                    @foreach($subjects as $subject)
                  <tr>
                  <td>{{$no++}}</td>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->created_at}}</td>
                    <td> <a href="{{route('subjects.edit', $subject->id)}}" class="btn btn-primary" type="submit" >Edit</a>
                    <form method="post" action="{{route('subjects.destroy', $subject->id)}}" >
                      @csrf()
                      @method('DELETE')
                    <a href="{{route('subjects.destroy', $subject->id)}}" class="btn btn-danger" type="submit" >Delete</a>
                    </form
                    </td
                  </tr>
                  @endforeach
                </tbody>

              </table>
            </div>
            @else

          	<div class="alert alert-danger">No record found</div>

          	@endif
          </div>
        </div>
        <div class="col-md-6">
            <form method="post" action="{{route('subjects.store')}}">
            @csrf()
                <div class="form-group">
                     <label> Subject Name </label>
                     <input type="text" name="subject" class="form-control">
                </div>

                <div class "form-group">
                <input type="submit" name="submit" class="btn btn-primary btn-block">
                </div>
                

                </form>
        </div>
    
          </div>
         @endsection
