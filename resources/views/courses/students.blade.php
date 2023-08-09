@extends('layouts.dashboard')

@section('content')
<div class="container">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#create">Create</a></li>
  @if (Auth::user()->can('admin'))

  <li><a data-toggle="tab" href="#update">Update</a></li>
  @endif
</ul>

<div class="tab-content">
  <div id="home"  class="tab-pane fade show active">
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                <th scope="col">Name</th>
                <th scope="col">BirthDate</th>
                <th scope="col">Phone</th>
                @if (Auth::user()->can('admin'))

                <th scope="col">Delete</th>
                @endif
                <th scope="col">Go to stomer</th>

                </tr>
            </thead>
            <tbody>
                @foreach($st as $b)
                <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->birthdate }}</td>
                <td>{{ $b->phone }}</td>
                @if (Auth::user()->can('admin'))

                <td><a href="{{route('deletestudent',$b->id)}}" >Delete {{ $b->name }}<a></td>
    @endif
    <td><a href="{{route('singlebook',$b->id)}}" >{{ $b->name }}<a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $st->links() !!}
        </div>
        </div>
        </div>
  <div id="create" class="tab-pane fade">
  <form action="{{route('addstudent')}}">
            @csrf
  <div class="form-group">
    <label >Name</label>
    <input  name="name"  required type="text" class="form-control" />
  </div>

  <div class="form-group">
    <label">BirthDate</label>
    <input name="birthdate" required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label >Grade</label>
    <input  name="grade"  required type="text" class="form-control" />
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  @if (Auth::user()->can('admin'))
  <div id="update" class="tab-pane fade">
  <form action="{{route('updatstudent')}}">
            @csrf

            <div class="form-group">
    <label >Name</label>
    <select  name="old"  required type="text" class="form-control" >
    @foreach($st as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</td>
    
                @endforeach

</select>
  </div>
  <div class="form-group">
    <label >Name</label>
    <input  name="name"  required type="text" class="form-control" />
  </div>

  <div class="form-group">
    <label">BirthDate</label>
    <input name="birthdate" required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label >Grade</label>
    <input  name="grade"  required type="text" class="form-control" />
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
@endif
</div>
</div>
@endsection
