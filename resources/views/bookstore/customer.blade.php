@extends('layouts.dashboard')

@section('content')
<div class="container">

<div class="tab-content">
    <h1>Borrow Details</h1>
<h1>{{$c->customerid}}</h1>
<h1>{{$c->bookid}}</h1>
<h1>{{$c->StartDate}}</h1>
<h1>{{$c->EndDate}}</h1>

</div>
</div>
@endsection
