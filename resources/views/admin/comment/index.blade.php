@extends('admin.layout.master')

@section('content')
    <h5>Comment List</h5>


    <div class="table-responsive" >
        <table class="table table-hover table-dark" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Post ID</th>
                <th>Body</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->post_id}}</td>
                    <td>{{$comment->body}}</td>

                    <td>
                        </a>

                                <form method="POST" action="{{route('admin.comments.destroy', $comment->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-circle btn-sm btn-danger float-left" title="delete">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

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
