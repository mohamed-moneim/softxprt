@extends('layouts.dashboard')

@section('content')
<div class="container">

<div class="tab-content">
    <h1>Customer Details</h1>
<h1>{{$c->name}}</h1>
<h1>{{$c->birthdate}}</h1>
<h1>{{$c->phone}}</h1>

</div>
</div>
@endsection
