@extends('frontend.layouts.master')

{{--@include('frontend.partials.header')--}}
@section('content')

{{--    <textarea name="" id="" cols="100%" rows="10"></textarea>--}}
{{--    <textarea class="float-right" name="" id="" cols="100%" rows="10" placeholder="your post"></textarea>--}}
<div class="media mx-5 py-5">
    <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg"
         alt="Avatar">
    <div class="media-body">
        <h5 class="mt-0 font-weight-bold blue-text">Anna Smith</h5>
        <p>
            @if(!$comment)
                write sometihng beautiful
            @else
            {{$comment}}
                @endif
        </p>

        <div class="media mt-3 shadow-textarea">
            <div class="media-body">
                <div>

                </div>
                <form action="{{route('my_blog.store')}}" method="GET">
                    @csrf
                    <div class="form-group basic-textarea rounded-corners">
                        <textarea class="form-control z-depth-1" id="exampleFormControlTextarea345" rows="3" placeholder="Update your comment..." name="comment"></textarea>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>
<div class="media mx-5 py-5">
    <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-10.jpg"
         alt="Avatar">
    <div class="media-body">
        <h5 class="mt-0 font-weight-bold blue-text">Caroline Horwitz</h5>
        <p>

            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
            odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
            fringilla. Donec lacinia congue felis in faucibus.
        </p>
    </div>
</div>


@endsection


