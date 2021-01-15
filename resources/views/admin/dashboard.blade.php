@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">Dashboard</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success mb-0" role="alert">
                          {{ session('status') }}
                      </div>
                  @else
                      <div class="alert alert-danger mb-0" role="alert">
                          Session Invalid!
                      </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
</div>
@endsection