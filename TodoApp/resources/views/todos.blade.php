<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Todos</h1>
            <div class="row">
                <div class="col-md-12">
                    <br />
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                    @endforeach
                    <form method="post" action="/saveTodo" id="selectform">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="todo" placeholder="Enter your todo here">
                        <br /><br />
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <button onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;" class="btn btn-warning">CLEAR</button>
                    </form>
                    <br />
                    <table class="table table-dark">
                        <th>ID</th>
                        <th>Todos</th>
                        <th>Completed</th>
                        <th>Action</th>

                        @foreach ($todos as $todo)
                        <tr>
                            <td>{{$todo->id}}</td>
                            <td>{{$todo->todos}}</td>
                            <td>
                                @if($todo->iscompleted)
                                <button class="btn btn-success">Completed</button>
                                @else
                                <button class="btn btn-warning">Not Completed</button>
                                @endif
                            </td>
                            <td>
                                @if(!$todo->iscompleted)
                                <a href="/markascompleted/{{$todo->id}}" class="btn btn-primary">Mark As Completed</a>
                                @else
                                <a href="/markasnotcompleted/{{$todo->id}}" class="btn btn-secondary">Mark As Not Completed</a>
                                @endif
                                <a href="/deletetodo/{{$todo->id}}" class="btn btn-danger">Delete Todo</a>
                                <a href="/updatetodo/{{$todo->id}}" class="btn btn-warning">Update Todo</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>