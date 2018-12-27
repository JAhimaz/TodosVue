<?php

namespace App\Services;

use App\Todo;
use Illuminate\Http\Request;

class TodoService extends TransformerService{

  public function all(){
    $todos = Todo::where('user_id', current_user()->id)->get();

    return respond($this->transformCollection($todos));
  }

  public function transform($todo){
    return [
      'id' => $todo->id,
      'title' => $todo->title,
      'completed' => $todo->completed
    ];
  }

  public function store(Request $request){
		$data = $request->validate([
      'title' => 'required|string|max:15',
    ]);

		Todo::create([
      'title' => $data['title'],
      'user_id' => current_user()->id
    ]);

    return response()->json('Stored');
  }

  public function complete(Request $request, Todo $todo){

    $data = $request->validate([
      'completed' => 'required'
    ]);

    $todo->completed = $data['completed'];
    $todo->save();

    return response()->json('Completed');
  }

  public function update(Request $request, Todo $todo){

    $data = $request->validate([
      'title' => 'required|string|max:15',
    ]);

    $todo->title = $data['title'];
    $todo->save();

    return no_content('Updated');
  }

  public function destroy(Todo $todo){
    $todo->delete();

    return response()->json('deleted');
  }
}
