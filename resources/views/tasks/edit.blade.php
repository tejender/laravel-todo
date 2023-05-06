@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Edit Task</h2>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="completed" value="1" name="completed" {{ $task->completed ? 'checked' : '' }}>
                    <label class="form-check-label" for="completed">Completed</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Task</button>
            </form>
        </div>
    </div>
@endsection
