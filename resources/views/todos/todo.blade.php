<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/todos/css/app.css')}}">
        <title>Todo App</title>
    </head>

    <body>
        <main class="wraper d-flex flex-column align-items-center justify-content-center">
            <form action="{{route('create')}}" method="POST" class="todos-form d-flex align-items-center flex-wrap shadow-sm">
                @csrf

                @if(session()->has('success'))
                <div class="alert alert-success text-capitalize rounded-0 mb-3 w-100">{{session()->get('success')}}</div>
                @endif

                <input type="text" name="todo" class="@error('todo') border border-danger @enderror form-control rounded-0" placeholder="Enter Task">
                <button class="btn btn-primary d-flex align-items-center justify-content-center text-capitalize rounded-0">add</button>
            
                @error('todo')
                <div class="alert w-100 alert-danger text-capitalize rounded-0 mt-3">{{$message}}</div>
                @enderror
            </form>

            <div class="todos-list mt-3">
                @foreach($todos as $todo)
                    <div class="item d-flex align-items-center shadow-sm mb-3 flex-wrap">
                        <p class="text p-0 m-0 text-capitalize">{{$todo->todo}}</p>

                        <div class="actions d-flex align-items-center w-100 mt-3 pt-3 border-top">
                            <a href="{{route('update', ['id' => $todo->id])}}" class="btn btn-primary rounded-0 me-3 d-flex align-items-center justify-content-center text-capitalize text-decoration-none">update</a>

                            <form action="{{route('delete', ['id' => $todo->id])}}" method="POST" class="delete-todo-form">
                                @csrf
                                <button class="btn btn-danger text-capitalize d-flex align-items-center justify-content-center rounded-0">delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                @if ($todos->count() <= 0)
                    <div class="alert alert-info text-capitalize rounded-0 shadow">no todos found, create some.</div>
                @endif
            </div>
        </main>
    </body>
</html>