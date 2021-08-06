@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>J.R-TDL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        input[type=checkbox]:checked + label.strikeMe {
            text-decoration: line-through;
        }
    </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header bg-info">
                    <h1 class="offset-4 text-dark">{{ $taskList->name }}</h1>
                </div>

                <div class="card-body">
                    <form action="/tasks/{{ $taskList->id }}/new_task" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <input type="text" name="task" required class="form-control col-md-8 mr-3">
                            <input type="submit" value="Create Todo" class="btn btn-info">
                        </div>
                    </form>





                    @foreach($taskList->list_items as $list_item)
                    <div class="d-flex pt-3 ml-3">
                        <div class="col-md-6">
                            <form id="fromIsDone_{{ $list_item->id }}" action="/tasks/{{ $taskList->id }}/mark_as_done" method="POST" class="pt-2">
                                @csrf
                                <input type="hidden" name="list_item_id" value="{{ $list_item->id }}">

                                <input type="hidden" name="is_done" value="{{ $list_item->is_done}}">

                                <input class="offset-4" id="strike"onchange="document.getElementById('fromIsDone_{{ $list_item->id }}').submit()" type="checkbox" {{ $list_item->is_done ? 'checked .': '' }}>

                                <label class="ml-3 strikeMe" for="strike">{{ $list_item->task }}</label>


                            </form>

                        </div>
                        <div class="col-md-6 mt-2">
                            <a href="/tasks/{{ $list_item->id }}/delete" class="pl-2">
                                <i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a>
                        </div>
                    </div>


                    @endforeach

                   

                </div>
            </div>
        </div>
    </div>
</div>

@endsection