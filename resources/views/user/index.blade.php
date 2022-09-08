@extends('layouts.main')

@section('content')



<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>
    <div class="card">
        @if(session()->has('message'))
           <div class="alert alert-success">
             {{ session('message') }}
           </div>
        @endif
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form method="GET" action="{{ route('user.index') }}" class="form-row align-items-center">
                        <div class="col-auto">
                          <input type="search" name="search" class="form-control" id="autoSizingInput" placeholder="Search Here...">
                        </div>
                        <div class="col-auto">
                          <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                      </form>
                </div>
                <div class="col">
                    <a href="{{ route('user.create') }}" class="float-right btn btn-primary">Create User</a>
                </div>

            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $users as $user)
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="" class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-success mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}" class="d-flex">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection
