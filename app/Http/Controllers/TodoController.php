<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::latest()->get();

        return successResponse($todos);
    }

    /**
     * store
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'note' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        $todo =  Todo::create([
            'ip_address' => $request->ip(),
            'title'      => $request->input('title'),
            'note'       => $request->input('note'),
            'comment'    => $request->input('comment'),
        ]);

        return successResponse($todo, 'Data Saved Successfully!', 201);
    }

    /**
     * show
     *
     *  @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return successResponse($todo);
    }

    /**
     * update
     *
     * @param  Illuminate\Http\Request $request
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'note' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        if ($todo) {
            $todo->update($request->only(['title', 'note', 'comment']));
            return successResponse($todo, 'Data Updated Successfully!', 202);
        }

        // return response()->json(['error' => 'Todo not found.'], 404);
    }



    /**
     * destroy
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return successResponse([], "Data Deleted Successfully!", 202);

        // return response()->json(['error' => 'Todo not found.'], 404);
    }
}
