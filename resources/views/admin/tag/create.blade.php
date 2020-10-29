@extends('admin.layout.master')

@section('content')

    <form method="POST" action="{{route('admin.tags.store')}}" class="user">
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


        </div>


        <button class="btn btn-primary btn-user btn-block" type="submit">
            Save Tag
        </button>
        <hr>
    </form>
    <div class="mb-10">
        <hr>
    </div>

@endsection
