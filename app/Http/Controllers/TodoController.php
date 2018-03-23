<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('pages.todo.index', compact('todos'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $todo = new Todo();
        $todo->task = $request->get('task');
        $todo->save();

        return redirect()->back();

    }

    public function edit($id)
    {
        // return $id;
        $todo = Todo::findOrFail($id);

        return view('pages.todo.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $todo = Todo::findOrFail($id);
        $todo->task = $request->get('task');
        $todo->update();

        return redirect()->route('todo.index');
    }
}
