@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-3">
                    <h3>Tasks</h3><br>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success" id="success-message">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Completed</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $sr => $task)
                            <tr>
                                <td>{{ $sr + 1 }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                                <td style="display:flex; gap:10px">
                                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary">Edit</a>
                                

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    console.log('object');

  setTimeout(function() {
    $('#success-message').fadeOut('fast');
  }, 5000); // This will make the message disappear after 5 seconds
</script>

@endsection
