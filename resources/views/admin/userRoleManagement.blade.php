@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 mb-5">
      <h1>Manage User</h1>
    </div>

    <div class="col-12 mb-5">
      <form method="POST" action="{{ route('admin.userRole', $user) }}">
        @csrf
        
        <div class="form-group">
          <label for="role" class="form-label">Update User Role</label>
          <div class="input-group">
            
            <select class="form-select" id="role" name="role">
              <option @php
                  if(3 == (int)$user->role) echo 'selected';
              @endphp value="3">User</option>
              <option @php
                  if(2 == (int)$user->role) echo 'selected';
              @endphp value="2">Manager</option>
              <option @php
                  if(1 == (int)$user->role) echo 'selected';
              @endphp value="1">Admin</option>
            </select>
            <button class="btn btn-outline-secondary" type="submit">Update</button>
          </div>
        </div>

      </form>
    </div>

    <div class="col-12 mb-5">
      <h3 class="mb-4">Account Details</h3>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td style="width:250px">Name</td>
            <td>{{ $user->name }}</td>
          </tr>
          <tr>
            <td>Mobile</td>
            <td>{{ $user->mobile }}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <td>Billing & Shippping Address</td>
            <td>{{ $user->address }}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection