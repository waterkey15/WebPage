@extends('admin.layout.master')

@section('content')
    <form method="POST" action="{{route('admin.roles.store')}}" class="user">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="name">Name</label>
                <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                @error('name')
                <span role="alert">
                        <small style="color: #fc0707">{{$message}}</small>
                    </span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="is_show_admin">Is show admin</label>
                <select name="is_show_admin" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

        </div>


        <button class="btn btn-primary btn-user btn-block" type="submit">
            Save Role
        </button>
        <hr>
    </form>
    <div class="mb-10">
        <hr>
    </div>
    @include('admin.role.common.table')

@endsection

@section('page-level-scripts')
    <script src="{{asset('admins/js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/js/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admins/js/demo/datatables-demo.js')}}"></script>
@endsection
