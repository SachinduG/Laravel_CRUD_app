<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Todo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br/><br/>
        <form action="/updatetodos" method="post">
            {{csrf_field()}}
            <input type="text" class="form-control" name="todo" value="{{$tododata->todos}}"/>
            <input type="hidden" name="id" value="{{$tododata->id}}"/>
            <br/>
            <input type="submit" class="btn btn-success" value="Update"/>
            &nbsp;&nbsp;<a href="javascript:history.back()" class="btn btn-warning">Cancel</a>
        </form>
</body>
</html>