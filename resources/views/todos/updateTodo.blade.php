<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/todos/css/app.css')}}">
        <title>Update Todo</title>
    </head>

    <body>
        <main class="wraper d-flex flex-column align-items-center justify-content-center">
            <form action="{{route('update', ['id' => $todo->id])}}" method="POST" class="todos-form d-flex align-items-center flex-wrap shadow-sm">
                @csrf

                <input type="text" value="{{$todo->todo}}" name="todo" class="@error('todo') border border-danger @enderror form-control rounded-0" placeholder="Enter Task">
                <button class="btn btn-primary d-flex align-items-center justify-content-center text-capitalize rounded-0">update</button>
            
                @error('todo')
                <div class="alert w-100 alert-danger text-capitalize rounded-0 mt-3">{{$message}}</div>
                @enderror
            </form>
        </main>
    </body>
</html>