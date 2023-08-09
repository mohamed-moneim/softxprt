@extends('layouts.dashboard')

@section('content')
<div class="container">

<div class="tab-content">
    <h1>Borrow Details</h1>
<h1>{{$b->customerid}}</h1>
<h1>{{$b->bookid}}</h1>
<h1>{{$b->StartDate}}</h1>
<h1>{{$b->EndDate}}</h1>

</div>
</div>
@endsection
