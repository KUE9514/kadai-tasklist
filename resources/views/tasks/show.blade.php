@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>{{ $task->id }}</th>
        </tr>
        <tr>
            <th>タスク</th>
            <th>{{ $task->content }}</th>
        </tr>
    </table>
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-light']) !!}
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection