@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks</h1>
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

        <div class="mb-3">
            <a href="{{ route('tasks.create') }}" class="btn btn-success">Create Task</a>
        </div>

        <form action="{{ route('tasks.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="date_from">From Date:</label>
                    <input type="date" id="date_from" name="date_from" value="{{ request('date_from') }}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="date_to">To Date:</label>
                    <input type="date" id="date_to" name="date_to" value="{{ request('date_to') }}" class="form-control">
                </div>
                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Clear Filter</a>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Assigned User</th>
                <th>Deadline</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td>
                        <form action="{{ route('tasks.updateStatus', $task) }}" method="POST" class="form-inline">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-control">
                                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm ml-2">Update</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No tasks found for the selected date range.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $tasks->links() }}
        </div>

    </div>
@endsection
