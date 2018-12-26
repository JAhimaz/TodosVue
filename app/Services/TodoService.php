<?php

namespace App\Services;

use App\Todo;

class TodoService extends TransformerService{

  public function all(){
    $todos = Todo::all();

    return response()->json($this->transformCollection($todos));
  }

  public function transform($todo){
    return [
      'id' => $todo->id,
      'title' => $todo->title,
      'completed' => $todo->completed
    ];
  }
}
