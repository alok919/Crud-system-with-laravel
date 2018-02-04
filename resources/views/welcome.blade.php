@extends('layouts.app')


@section('content')
	
	<div class="container">


		
		@if(session('successMsg'))

			<div class="alert alert-dismissible alert-success">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Well done!</strong> {{session('successMsg')}}
			</div>
		@endif


		 <table class="table table-striped table-hover table-bordered ">
  <thead>
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>last Name</th>
    <th>Email </th>
    <th>Phone </th>
    <th class="text-center">Action</th>
  </tr>
  </thead>
  <tbody>
 
  
    @foreach($students as $student)
	  <tr class="active">
		<td>{{$student->id}}</td>
		<td>{{$student->first_name}}</td>
		<td>{{$student->last_name}}</td>
		<td>{{$student->email}}</td>
		<td>{{$student->phone}}</td>
		<td class="text-center">
		<a href="{{route('edit',$student->id)}}" class="btn btn-raised btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>

			<form action="{{route('delete',$student->id)}}" method="POST" style="display: none;" id="delete-form-{{$student->id}}">
				{{csrf_field()}}
				{{method_field('delete')}}
			</form>

			<button  class="btn btn-raised btn-danger btn-sm" type="button" onclick="if(confirm('Are you sure, you want to delete this  ?')){
					event.preventDefault();
					document.getElementById('delete-form-{{$student->id}}').submit();
				}else{
					event.preventDefault();

					}"	><i class="fa fa-trash" aria-hidden="true"></i></button>
			
		</td>
	 </tr>
    @endforeach
  
 
  </tbody>
</table>

		{{$students->links()}}
	</div>



@endsection