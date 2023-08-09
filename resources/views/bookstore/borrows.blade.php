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
                <th scope="col">Book Id</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                @if (Auth::user()->can('admin'))

                <th scope="col">Delete</th>
                @endif
                <th scope="col">Go to Borrow</th>

                </tr>
            </thead>
            <tbody>
                <?php
?>
                @foreach($borrow[0] as $b)
                <tr>
                <td>{{ $b->bookid }}</td>
                <td>{{ $b->customerid }}</td>
                <td>{{ $b->StartDate }}</td>
                <td>{{ $b->EndDate }}</td>
            <?php
            ?>
                @if (Auth::user()->can('admin'))

                <td><a href="{{route('deleteBorrow',$b->id)}}" >Delete<a></td>
    @endif
    <td><a href="{{route('singleBorrow',$b->id)}}" >{{ "Go" }}<a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $borrow[0]->links() !!}
        </div>
        </div>
        </div>
  <div id="create" class="tab-pane fade">
  <form action="{{route('addBorrow')}}">
            @csrf

            <div class="form-group">
    <label >User</label>
    <select  name="customerid"  required type="text" class="form-control" >
    @foreach($borrow[1] as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</td>
    
                @endforeach

</select>
  </div>
  <div class="form-group">
    <label >Book</label>
    <select  name="bookid"  required type="text" class="form-control" >
    @foreach($borrow[2] as $b)
                <option value="{{ $b->id }}">{{ $b->title }}</td>
    
                @endforeach

</select>
  </div>
  <div class="form-group">
    <label">Start Date</label>
    <input name="startDate" required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label">End Date</label>
    <input name="endDate" required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  @if (Auth::user()->can('admin'))
  <div id="update" class="tab-pane fade">
  <form action="{{route('updateBorrow')}}">
            @csrf

            <div class="form-group">
    <label >Book Title</label>
    <select  name="old"  required type="text" class="form-control" >
    @foreach($borrow[0] as $b)
                <option value="{{ $b->id }}">{{ $b->id }}</td>
    
                @endforeach

</select>

<div class="form-group">
    <label">Start Date</label>
    <input name="startDate" required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>
  <div class="form-group">
    <label">End Date</label>
    <input name="endDate" required type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company name">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
@endif
</div>
</div>
@endsection
