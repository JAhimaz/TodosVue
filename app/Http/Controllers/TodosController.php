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

	/**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index(Request $request){
     if ($request->wantsJson()){
       //If it requires Json run it through the service.
       return $this->todosService->all();
     }

     return view('todos.index');
   }

  public function create(){
    return view('todos.create');
  }

  public function store(Request $request){
		$data = $request->validate([
      'title' => 'required|string|max:15',
    ]);

		Todo::create($data);

    return response()->json('Stored');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function complete(Request $request, Todo $todo){

    $data = $request->validate([
      'completed' => 'required'
    ]);

    $todo->completed = $data['completed'];
    $todo->save();

    return response()->json('Completed');
  }

  public function edit(Todo $todo){

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Todo $todo){

		$data = $request->validate([
      'title' => 'required|string|max:15',
    ]);

		$todo->title = $data['title'];
		$todo->save();

		return response()->json('Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Todo  $todo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Todo $todo){
    $todo->delete();

		return response()->json('deleted');
  }
}
