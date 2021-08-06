@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/style.css">

<div class="container">


    <div class="row">
        
        <h1 class="pl-5 offset-5">My Task</h1>
        
        <form action="/profile/{user}/show" method="get">
      
            <div class="form-group has-search mt-5">
                <input type="search" name="query" class="form-control" style="margin-left: 130px;" placeholder="Search">
            </div>
        </form>

        <table class="table mt-2">
            
            <thead class="bg-info">
                <tr>
                    <th>User_ID</th>
                    <th>List_ID</th>
                    <th>Task</th>
                    <th>Is_Done</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task )
                
                <tr>
                    <td>{{ $task->user_id}}</td>
                    <td>{{ $task->list_id}}</td>
                    <td>{{ $task->task}}</td>
                    <td>{{ $task->is_done}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>
    
       
    </div>

   
</div>
@endsection