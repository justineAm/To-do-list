@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/style.css">

<div class="container">

    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle">

        </div>

        <div class="col-9 p-5">

            <div class="d-flex align-items-center pb-4">
                <h1>{{$user->profile->title}}</h1>
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="pt-3 font-weight-bold">{{$user->name}}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->email}}</a></div>

        </div>
    </div>

   
    

</div>
@endsection