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
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Go to Book Page</th>
                @if (Auth::user()->can('admin'))

                <th scope="col">Delete</th>
                @endif
                </tr>
            </thead>
            <tbody>
                @foreach($books as $b)
                <tr>
                <td>{{ $b->title }}</td>
                <td>{{ $b->author }}</td>
                @if (Auth::user()->can('admin'))

                <td><a href="{{route('deletebook',$b->id)}}" >Delete {{ $b->title }}<a></td>
    @endif
    <td><a href="{{route('singlebook',$b->id)}}" >{{ $b->title }}<a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $books->links() !!}
        </div>
        </div>
        </div>
  <div id="create" class="tab-pane fade">
  <form action="{{route('addbook')}}">
            @csrf
  <div class="form-group">
    <label >Book Title</label>
    <input  name="title"  required type="text" class="form-control" />
  </div>

  <div class="form-group">
    <label">Author</label>
    <input  name="author"  required type="text" class="form-control" />
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  @if (Auth::user()->can('admin'))
  <div id="update" class="tab-pane fade">
  <form action="{{route('updatebook')}}">
            @csrf

            <div class="form-group">
    <label >Book Title</label>
    <select  name="old"  required type="text" class="form-control" >
    @foreach($books as $b)
                <option value="{{ $b->id }}">{{ $b->author }}</td>
    
                @endforeach

</select>
  </div>
  <div class="form-group">
    <label >Update Book Title</label>
    <input  name="title"  required type="text" class="form-control" />
  </div>

  <div class="form-group">
    <label">Update Author</label>
    <input  name="author"  required type="text" class="form-control" />
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
@endif
</div>
</div>
@endsection
