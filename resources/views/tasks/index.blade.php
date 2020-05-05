@extends('layouts.app')

@section('content')
    @if (Auth::check())
        
        <h1>タスク一覧</h1>
        
        @if (count($tasks) > 0)
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ステータス</th>
                        <th>タスク</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        @if(Auth::id() == $task->user->id)
                            <tr>
                                <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->content }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
        {!! link_to_route('tasks.create', 'タスクの追加', [], ['class' => 'btn btn-primary']) !!}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Tasklist</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection