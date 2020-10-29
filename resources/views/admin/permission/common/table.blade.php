<div class="table-responsive" >
    <table class="table table-hover table-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Is Main</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{toWord($permission->name)}}</td>
                <td>
                    @if($permission->is_main ===1)
                        Main
                    @else
                        Not Main
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.permissions.edit', $permission->id)}}" class="btn btn-circle btn-sm btn-info float-left" title="edit">
                        <i class="fas fa-pen"></i>

                    </a>
                    @if($permission->is_main !== 1)
                    <form method="POST" action="{{route('admin.permissions.destroy', $permission->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-circle btn-sm btn-danger float-left" title="delete">
                            <i class="fas fa-trash"></i>
                        </button>

                    </form>
                        @endif
                </td>
            </tr>
        @endforeach()
        </tbody>
    </table>
</div>
