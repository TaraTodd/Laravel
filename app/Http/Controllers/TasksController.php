<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    
   public function index()

   {

   		//$tasks = DB::table('tasks')->latest()->get(); //query builder

    	$tasks = Task::all();// elequant in dedicated class ^^ easier than abobe

    	//return $tasks; //return as json -- good for apis

    	return view('tasks.index', compact('tasks')); 

   }

   public function show(Task $task)//recieve request -- route model binding wild card name matches variable name
   //task find(wildcard)
   {

   		//$task = DB::table('tasks')->find($id); //query builder //find by id -- find id that matches

    	//$task = Task::find($id);//elequant way ^^ easier than above -- need to reference subfolder

    	//return $task;

    	//dd($task); //help function

    	//return $tasks; //return as json -- good for apis

    	return view('tasks.show', compact('task')); //load view passing through variable/redener

   }

}
