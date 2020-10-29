@extends('admin.layout.master')

@section('content')
    <form method="POST" action="{{route('admin.posts.store')}}" class="user">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="title" placeholder="Enter Title">
                @error('title')
                <span role="alert">
                        <small style="color: #fc0707">{{$message}}</small>
                    </span>

                @enderror
            </div>

        </div>
        <div class="form-group">
            <div class="col-sm-12 mb-3 mb-sm-0">

            <textarea type="text" class="form-control form-control-user" name="body" placeholder="Post Body">
            </textarea>


                @error('body')
            <span role="alert">
                        <small style="color: #fc0707">{{$message}}</small>
                    </span>

            @enderror
            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="role_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="role_id" class="form-control">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
            Save Post
        </button>
        <hr>
    </form>


@endsection


