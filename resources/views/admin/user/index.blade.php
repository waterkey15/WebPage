@extends('admin.layout.master')

@section('content')

    <div class="table-responsive" >
        <table class="table table-hover table-dark" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {{$role->name}}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-circle btn-sm btn-info float-left" title="edit">
                            <i class="fas fa-pen"></i>

                        </a>
                        @foreach($user->roles as $role)
                            @if($role->name !== 'admin')
                                <form method="POST" action="{{route('admin.users.destroy', $user->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-circle btn-sm btn-danger float-left" title="delete">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>
                            @endif
                        @endforeach

                    </td>
                </tr>
            @endforeach()
            </tbody>
        </table>
    </div>


@endsection


@section('page-level-scripts')
    <script src="{{asset('admins/js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/js/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admins/js/demo/datatables-demo.js')}}"></script>
@endsection
