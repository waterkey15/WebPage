@extends('admin.layout.master')

@section('content')

    <h5 class="pull-right">
        Blog Post List
    </h5>

    <a href="{{route('admin.posts.create')}}" class="btn btn-info btn-icon-split float-left">
        Add new Post
    </a>

    <div class="table-responsive" >
        <table class="table table-hover table-dark" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Author</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Published</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->tags->implode('name', ', ')}}</td>
                    <td>{{$post->published}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', $post->id)}}" class="btn btn-circle btn-sm btn-info float-left" title="edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{route('admin.categories.show', $post->id)}}" class="btn btn-circle btn-sm btn-info float-left" title="Show">
                            <i class="fas fa-pen"></i>
                        </a>

                        <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
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
