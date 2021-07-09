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
        return response()->json(['todos' => Todo::latest('id')->get()]);
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
        
        Todo::create([
            'title' => $request->input('title'),
            'note' => $request->input('note'),
            'comment' => $request->input('comment'),
        ]);

        return response()->json(['success' => 'Todo saved.']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['todo' => Todo::find($id)]);
    }
    
    /**
     * update
     *
     * @param  Illuminate\Http\Request $request
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'note' => 'required|string',
            'comment' => 'nullable|string',
        ]);
        
        $todo = Todo::find($id);
        
        if($todo) {
            $todo->update([
                'title' => $request->input('title'),
                'note' => $request->input('note'),
                'comment' => $request->input('comment'),
            ]);

            return response()->json(['success' => 'Todo saved.']);
        }

        return response()->json(['error' => 'Todo not found.'], 404);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        
        if($todo) {
            $todo->delete();
            return response()->json(['success' => 'Todo deleted.']);
        }

        return response()->json(['error' => 'Todo not found.'], 404);
    }
}
