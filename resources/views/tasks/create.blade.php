@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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
            <h1 class="text-center mb-4">Create New Task</h1>

            <!-- Show All Tasks Button -->
            <div class="text-center mb-3">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Show All Tasks</a>
            </div>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Task Title" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" placeholder="Task Description" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="user_id">Receiver:</label>
                    <select class="form-control" name="user_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" class="form-control" name="deadline" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </div>
            </form>
        </div>
    </div>
@endsection
