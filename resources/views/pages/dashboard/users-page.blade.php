@extends('layout.sidenav-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 align="center">Users List</h3>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Ser No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($users->perPage() * ($users->currentPage() - 1)) + 1;
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td align="center">{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="/users-edit/{{ $user->id }}" class="btn btn-primary my-0"><i class="fa fa-pen"></i></a>
                            <a href="/user-delete/{{ $user->id }}" class="btn btn-danger my-0"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>    
    </div>

@endsection