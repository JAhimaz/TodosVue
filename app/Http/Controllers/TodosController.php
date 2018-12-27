<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Services\TodoService;

class TodosController extends Controller{

  private $todosService;

  public function __construct(TodoService $todosService)
  {
    $this->todosService = $todosService;
  }

 public function index(Request $request){
   if ($request->wantsJson()){
     return $this->todosService->all();
   }
   return view('todos.index');
 }

  public function create(){
    //
  }

  public function store(Request $request){
		return $this->todosService->store($request);
  }

  public function complete(Request $request, Todo $todo){
    return $this->todosService->complete($request, $todo);
  }

  public function edit(Todo $todo){
    //
  }

  public function update(Request $request, Todo $todo){
    return $this->todosService->update($request, $todo);
  }

  public function destroy(Todo $todo){
    return $this->todosService->destroy($todo);
  }
}
