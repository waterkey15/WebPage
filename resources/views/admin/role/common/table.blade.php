<div class="table-responsive" >
    <table class="table table-hover table-dark" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Is Main</th>
            <th>Is See Admin</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{toWord($role->name)}}</td>
                <td>
                    @if($role->is_main ===1)
                        Main
                    @else
                        Not Main
                    @endif
                </td>

                <td>
                    @if($role->is_show_admin ===1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.roles.edit', $role->id)}}" class="btn btn-circle btn-sm btn-info float-left" title="edit">
                        <i class="fas fa-pen"></i>

                    </a>
                    <a href="{{route('admin.roles.manage-permissions', $role->id)}}" class="btn btn-circle btn-sm btn-dark float-left" title="manage permission">
                        <i class="fas fa-plus"></i>

                    </a>
                    @if($role->is_main !== 1)
                    <form method="POST" action="{{route('admin.roles.destroy', $role->id)}}">
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
