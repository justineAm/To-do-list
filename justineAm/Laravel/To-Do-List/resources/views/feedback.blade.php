@extends('layouts.app')

@section('content')


<div class="container offset-4">

    <div class="row">

        <div class=" mt-5">
            <h1>Feedback About The App</h1>
            <hr>
        </div>


    </div>
    <div class="row mt-3">
        <form action="/addComment" method="post">
            @csrf
            <div class="form-group d-flex justify-content-center">
                <input type="text" class="form-control col-8 ml-2" name="comment">
                <button type="submit" class="btn btn-info ml-2">Add Comment</button>
            </div>
        </form>
    </div>
    <div class="offset-1">
        <hr style="margin-left:-110px; width: 410px;">
        <div class="row">
            <p style="margin-left: 50px;">Display Comments</p>
        </div>
        @foreach($comment as $comments)
        <div class="row mt-2" style="margin-left: -100px;">
            @csrf
            <div class="d-flex align-items-center">


                <img src="{{$comments->user->profile->profileImage() }}" class="rounded-circle w-100 h-75" style="max-width: 35px; ">
                <p class="font-weight-bold mt-2 ml-2">{{ $comments->user->username}}:</p>

                <p class="ml-4 mt-2" >
                    {{$comments->feedback}}
                </p>

            </div>


        </div>
        @endforeach
        <p></p>


    </div>


</div>
@endsection