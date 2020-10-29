@extends('admin.layout.master')

@section('content')
    <form method="POST" action="{{route('admin.users.store')}}" class="user">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="name" placeholder="First Name">
                @error('name')
                    <span role="alert">
                        <small style="color: #fc0707">{{$message}}</small>
                    </span>

                @enderror
            </div>

        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address">

            @error('email')
            <span role="alert">
                        <small style="color: #fc0707">{{$message}}</small>
                    </span>

            @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" name="password" placeholder="Password">

                @error('password')
                <span role="alert">
                        <small style="color: #fc0707">{{$message}}</small>
                    </span>

                @enderror
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="role_id" class="form-control">
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
            Save User
        </button>
        <hr>
    </form>


@endsection

