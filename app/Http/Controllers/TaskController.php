<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use PDF;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = new Task;
        $task = $task->get();

        return view('tasks.index',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->des = $request->des;
        $task->save();

        return redirect('task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = new Task;
        $task = $task->where('id',$id)->first();
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = new Task;
        $task = $task->where('id',$id)->first();
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = new Task;
        $task = $task->where('id',$id)->first();
        $task->title = $request->title;
        $task->des = $request->des;
        $task->update();

        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = new Task;
        $task = $task->where('id',$id)->first();
        $task->delete();

        return redirect('task');
    }

    public function generatePDF($id)
    {
        $task = new Task;
        $task = $task->where('id',$id)->first();

        $pdf = PDF::loadView('tasks.show', compact('task'));

        return $pdf->download('task.pdf');
    }
}
