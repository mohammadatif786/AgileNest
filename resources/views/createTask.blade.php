<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ auth()->user()->name }} Panel </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-7">
      <h1 class="text-center">Create Task</h1>

        <form action="{{ route('admin.store.tasks') }}" method="POST">
          @csrf

          <div class="modal-body">
              
            <div class="col-md-12 mb-2">

              <label for="tasktitle">Task Title</label>
              <input type="text" name="title" id="task_title" class="form-control">

            </div>
            <div class="col-md-12 mb-2">

              <label for="taskdescription">Task Description</label>
              <input type="text" name="description" id="task_description" class="form-control">
            </div>
            <div class="col-md-12 mb-2">

            <label for="taskprogress">Task Progress</label>
              <input type="text" name="status" id="task_progress" class="form-control">
            </div>

          </div>
          <div class="modal-footer">
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>

        </form>
      </div>
    </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
