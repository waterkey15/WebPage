@extends('admin.layout.master')

@section('content')

    <h5 class="pull-right">
        Blog Tag List
    </h5>

    <a href="{{route('admin.tags.create')}}" class="btn btn-info btn-icon-split float-left">
        Add new Tag
    </a>

    <div class="table-responsive" >
        <table class="table table-hover table-dark" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
            </thead>

            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>
                        <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-circle btn-sm btn-info float-left" title="edit">
                            <i class="fas fa-pen"></i>

                        </a>

                                <form method="POST" action="{{route('admin.tags.destroy', $tag->id)}}">
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
