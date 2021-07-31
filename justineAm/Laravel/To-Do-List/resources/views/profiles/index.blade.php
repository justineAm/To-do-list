@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle">
        </div>
        <div class="col-9 p-5">

            <div class="d-flex justify-content-between align-items-baseline">

                <div class="d-flex align-items-center pb-4">
                    <h1>{{ $user->username }}</h1>

                </div>
                
            </div>
            

            @can('update',$user->profile)
                
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    
            @endcan
            
           
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="https://facebook.com/justine/1">{{ $user->profile->url }}</a></div>
            
        </div>
    </div>
    <div class="row">


       

    </div>

</div>
@endsection