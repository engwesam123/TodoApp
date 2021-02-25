@extends('layouts.app')

@section('title', 'All todos')

@section('content')
<div class="container">
    <div class="row pt-3 justify-content-center">
        <div class="card" style="width: 50%">
            <div class="card-header text-center">
                <h1>Todo App</h1>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card-body">
                <ul class="list-group">
                    @forelse($todos as $todo)
                        <li class="list-group-item text-muted">
                            {{$todo -> title}}
                            <span style="float: right; margin-right: 4px; ">
                                <a href="todos/{{$todo-> id}}/delete">
                                    <i class="fa fa-trash" aria-hidden="true" style="color: red ;"></i>
                                </a>
                            </span>
                            <span style="float: right; margin-right: 4px; ">
                                <a href="todos/{{$todo-> id}}">
                                    <i class="fa fa-eye" aria-hidden="true" style="color: blueviolet ;"></i>
                                </a>
                            </span>
                            <span style="float: right; margin-right: 4px; ">
                                <a href="todos/{{$todo->id}}/edit">
                                   <i class="fa fa-edit " aria-hidden="true" style="color: #1a202c"></i>
                                </a>
                            </span>
                            @if(! $todo->completed)
                            <span style="float: right; margin-right: 4px; ">
                                <a href="todos/{{$todo->id}}/complete">
                                    <i class="fa fa-check-square" style="color: orange"></i>
                                </a>
                            </span>
                            @endif
                        </li>
                    @empty
                        <p>No todos</p>

                    @endforelse
                </ul>
                    <a href="http://127.0.0.1:8000/create" class="btn btn-success mt-3" style="width: 40%">Create new todo</a>
            </div>
        </div>
    </div>
</div>
@endsection

