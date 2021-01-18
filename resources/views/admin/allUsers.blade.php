@extends('layouts/app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="mb-5">All Users</h1>

        @foreach ($users as $user)
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <table>
                <tr>
                  <td><img style="height: 50px;" src=""></td>
                  <td>
                    <div class="pe-3">
                      <h6 class="mb-2">{{ $user->name }}</h6>
                    </div>
                    <div>
                      <small class="text-muted">Username: {{$user->username }}</small>
                    </div>
                    <div>
                      <small class="text-muted">Email: {{$user->email }}</small>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div style="min-width: 280px;">
              <h6 class="mb-2">Role:
                @if ($user->is_admin())
                <span class="badge bg-primary"><small>ADMIN</small></span>
                @endif
                @if ($user->is_manager())
                <span class="badge bg-success"><small>MANAGER</small></span>
                @endif
                <span class="badge bg-secondary"><small>USER</small></span>
              </h6>
              <div>
                <small class="text-muted">Created: {{ $user->created_at->diffForHumans() }}</small>
              </div>
              <div>
                <a class="text-decoration-none" href="{{ route('admin.userRole', $user) }}"><strong>Manage Roles</strong></a>
              </div>
            </div>
          </li>
        </ul>
        @endforeach
        <div class="py-5">
          {{ $users->onEachSide(2)->links() }}
        </div>
    </div>
  </div>
</div>
@endsection