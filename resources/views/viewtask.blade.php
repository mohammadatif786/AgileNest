<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ auth()->user()->name }} Panel </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <h1 class="text-center">Task List</h1>
                <table class="table table-responsive table-striped">
        
                    @auth
                        @if (auth()->user()->hasRole('Admin'))
                            <a class="btn btn-sm btn-success mb-3" href="{{ route('admin.create.task') }}">Create Task</a>
                        @endif
                        <form action="{{ route('search.tasks') }}" method="GET" class="form-inline">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">

                                </div>
                                <div class="col-md-6">
                                     <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    @endauth

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Progress</th>
                        @auth
                            @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Manager'))
                                <th>Action</th>
                            @endif
                        @endauth
                    </tr>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td> {{ $task->title }} </td>
                            <td> {{ $task->description }} </td>
                            <td> {{ $task->status }} </td>
                            @auth
                                @if (auth()->user()->hasRole('Admin'))
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.tasks.edit', $task->id) }}">Edit Task</a>
                                        <a class="btn btn-sm mt-1 btn-outline-danger" href="{{ route('tasks.destroy', $task->id) }}">Delete Task</a>
                                    </td>
                                
                                @endif
                                @if (auth()->user()->hasRole('Manager'))
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('manager.tasks.edit', $task->id) }}">Edit Task</a>
                                    </td>
                                @endif
                            @endauth
                        </tr>
                    @endforeach
                </table>

                <div class="d-flex justify-content-center">
                    {{ $tasks->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
