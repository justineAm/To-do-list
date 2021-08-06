@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">

                    <h1 class="offset-4 text-dark">
                        Create your List
                    </h1>
                </div>
                <div class="card-body ">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="save_new_tasklist" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <input type="text" name="name" required class="form-control col-md-8 mr-3">
                            <input type="submit" class="btn btn-info" value="Create List">
                        </div>
                    </form>
                    <ul class="pt-3">
                        @foreach ($taskLists as $taskList)
                        <div class="pt-3 ml-3 d-flex">
                            <div class="col-md-6">
                            <ul style="list-style-type: none;">
                                <li>
                                    <b>
                                        <a href="/tasks/{{ $taskList->id }}" style="color:black;">
                                            {{ $taskList->name }} &nbsp;
                                            ({{ $taskList->count_done}}/{{ $taskList->list_items()->count() }})
                                        </a>
                                    </b>
                                </li>
                            </ul>
                            </div>
                            <div class="col-md-6">
                            <span class="pl-2">
                                         
                                         <a href="/tasks/{{ $taskList->id }}/destroy">

                                             
                                                 <i class="fa fa-trash-o text-danger" aria-hidden="true">

                                                 </i>
                                             

                                         </a></span>

                            </div>

                        </div>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection