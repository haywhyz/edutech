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
              <h2>Resource List</h2>
              <div class="clearfix"></div>
            </div>
            @php($no=0)
            @if(count($resources) > 0)
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date Added</th>
                    <th> Operations </th>
                  </tr>
                </thead>

                <tbody>
                  <?php  $no=1; ?>
                    @foreach($resources as $resources)
                  <tr>
                  <td>{{$no++}}</td>
                    <td>{{$resources->name}}</td>
                    <td>{{$resources->created_at}}</td>
                    <td> <a href="{{route('resources.edit', $resources->id)}}" class="btn btn-primary" type="submit" >Edit</a>
                     <a href="javascript:;" class="btn btn-danger"  data-toggle="modal" onclick="deleteData({{$resources->id}})" 
                     data-target="#DeleteModal" class="btn btn-xs btn-danger">Delete
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
    
            <form method="post" action="{{route('resources.store')}}" enctype="multipart/form-data">
            @csrf()
                <div class="form-group">
                     <label> Resource Name </label>
                     <input type="text" name="name" class="form-control">
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





          
     <div id="DeleteModal" class="modal fade text-primary" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header bg-primary">
                 <button type="button" class="close" data-dismiss="modal"></button>
                 <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
             </div>
             <div class="modal-body">
                 @csrf
                 @method('DELETE')
                 <p class="text-center">Are You Sure Want To Delete ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>

  <script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("resources.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>
         @endsection
