@extends('layouts.dashboard')

@section('content')
<div class="container">

<div class="tab-content">
    <h1>Book Details</h1>
<h1>{{$book->title}}</h1>
<h1>{{$book->author}}</h1>

</div>
</div>
@endsection
