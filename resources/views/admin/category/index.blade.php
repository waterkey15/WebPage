@extends('admin.layout.master')

@section('content')

    <h5 class="pull-right">
        Blog Category List
    </h5>

    <a href="{{route('admin.categories.create')}}" class="btn btn-info btn-icon-split float-left">
        Add new Category
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
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-circle btn-sm btn-info float-left" title="edit">
                            <i class="fas fa-pen"></i>

                        </a>

                                <form method="POST" action="{{route('admin.categories.destroy', $category->id)}}">
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
