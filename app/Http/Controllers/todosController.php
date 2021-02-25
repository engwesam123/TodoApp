<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class todosController extends Controller
{
       public function index(){
       $todos = Todo::all();
       return view('todos.index', compact('todos'));
    }

    public function showTodo($todo){
       return view('todos.showTodo')->with('todo',  Todo::find($todo));
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request){
//        return $request->all();
//        return $request->input();

        //make validate 1
        $request->validate([
            'todoTitle'=> 'required | min: 6',
            'todoDescription' => 'required'
        ]);

        //make validate 2
//        $this->validate($request, [
//            'todoTitle'=> 'required',
//            'todoDescription' => 'required'
//        ]);

        $todo = new Todo();
        $todo->title = $request->todoTitle;
        $todo->description = $request->input('todoDescription');

        $todo->save();
        $request->session()->flash('success', 'Todo created successfully');

        return redirect('/todos');
       }

       public function edit($todo){
           return view('todos.edit')->with('todo',  Todo::find($todo));
       }

    public function update(Request $request, $todo)
    {
        $request->validate([
            'todoTitle' => 'required | min: 6',
            'todoDescription' => 'required'
        ]);

        $todo = Todo::find($todo);
        $todo->title = $request->get('todoTitle');
        $todo->description = $request->get('todoDescription');

        $todo->save();
        $request->session()->flash('success', 'Todo updated successfully');

        return redirect('/todos');
    }

    public function destroy($todo){
           $todo = Todo::find($todo);
           $todo->delete();

           session()->flash('success', 'Todo deleted successfully');

           return redirect('/todos');

    }

    public function complete($todo){

        $todo = Todo::find($todo);

        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Todo completed successfully');

        return redirect('/todos');

    }
}
