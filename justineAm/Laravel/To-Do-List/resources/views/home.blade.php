@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <center>
                        <h1>
                            Time is Gold
                        </h1>
                    </center>

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

                            <input type="text" name="name" required>
                            <input type="submit" class="btn btn-primary" value="Create List">

                        </div>

                    </form>

                    <ul class="pt-3">

                        @foreach ($taskLists as $taskList)
                        <div class="pt-3 ml-3 d-flex">
                            <li> <b><a href="/tasks/{{ $taskList->id }}" style="color:black;"> {{ $taskList->name }} &nbsp;
                                        ({{ $taskList->count_done}}/{{ $taskList->list_items()->count() }})</a></b>


                                <!-- <form id="deleteList_{{ $taskList->id }}"action="/tasks/{{ $taskList->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE') -->
                                <!-- @method('DELETE') -->
                                    <span class="pl-2"><a href="/tasks/{{ $taskList->id }}/destroy"><i class="fa fa-trash-o text-danger" aria-hidden="true" ></i></a></span>
                                <!-- </form> -->



                            </li>

                        </div>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection