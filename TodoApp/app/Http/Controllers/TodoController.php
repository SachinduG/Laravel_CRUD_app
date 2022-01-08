<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function save(Request $request)
    {
        $todo = new Todo;
        $this->validate($request, [
            'todo' => 'Required|max:200|min:5'
        ]);
        $todo->todos = $request->todo;
        $todo->save();

        $data = Todo::all();

        return view('todos')->with('todos', $data);
    }

    public function updatetodoascompleted($id)
    {
        $todo = Todo::find($id);
        $todo->iscompleted = 1;
        $todo->save();
        return redirect()->back();
    }

    public function updatetodoasnotcompleted($id)
    {
        $todo = Todo::find($id);
        $todo->iscompleted = 0;
        $todo->save();
        return redirect()->back();
    }

    public function deletetodo($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back();
    }

    public function updatetodo($id)
    {
        $todo = Todo::find($id);
        return view('updatetodo')->with('tododata', $todo);
    }

    public function updatetodos(Request $request)
    {
        $id = $request->id;
        $todo = $request->todo;
        $this->validate($request, [
            'todo' => 'Required|max:200|min:5'
        ]);
        $data = Todo::find($id);
        $data->todos = $todo;
        $data->save();
        $datas = Todo::all();
        return view('todos')->with('todos', $datas);
    }
}
