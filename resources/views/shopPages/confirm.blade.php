@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">

        {{-- Title --}}
        <div class="col-12 text-center py-5 mb-5">
            <h1>Checkout Completed</h1>
            <h5 class="mb-5"><em>Thankyou for shopping with us</em></h5>
            <a class="btn btn-primary" href="{{ route('home') }}">Continue Shopping</a>
        </div>

    </div>
</div>
@endsection