@extends('layouts.app')

@section('content')
<!-- <style>
    input[type=checkbox]:checked + label.strikeThrough {
        
        text-decoration: line-through;
        color: red;
    }
    .strikeMe{
        text-decoration: line-through;
    }

</style> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $taskList->name }}</div>
                <!-- <h4 class="strikeMe"> Line Through hEre</h4> -->
                <div class="card-body">
                    <form action="/tasks/{{ $taskList->id }}/new_task" method="POST">
                        @csrf
                        <input type="text" name="task" required>
                        <input type="submit" value="Create Todo">

                    </form>
                    @foreach($taskList->list_items as $list_item)
                    <div class="d-flex">
                        <form id="fromIsDone_{{ $list_item->id }}" action="/tasks/{{ $taskList->id }}/mark_as_done" method="POST">
                            @csrf
                            <input type="hidden" name="list_item_id" value="{{ $list_item->id }}">

                            <input type="hidden" name="is_done" value="{{ $list_item->is_done}}">

                            <input onchange="document.getElementById('fromIsDone_{{ $list_item->id }}').submit()" type="checkbox" {{ $list_item->is_done ? 'checked .': '' }}>

                            <span>{{ $list_item->task }}</span>
                                <a href="#" class="pl-2"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>
           
                        </form>


                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection