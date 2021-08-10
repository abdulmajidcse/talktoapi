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
        $todos = Todo::where('ip_address', request()->ip())->latest('id')->get();
        return talkToApiResponse($todos);
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

        return talkToApiResponse($todo, 'Data Saved Successfully!', 201);
    }

    /**
     * show
     *
     *  @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo =  Todo::where('ip_address', request()->ip())->where('id', $id)->first();
        if ($todo) {
            return talkToApiResponse($todo);
        }

        return talkToApiResponse([], 'Data Not Found!', 404, false);
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

        $todo = Todo::where('ip_address', request()->ip())->where('id', $id)->first();
        
        if($todo) {
            $todo->update([
                'title' => $request->input('title'),
                'note' => $request->input('note'),
                'comment' => $request->input('comment'),
            ]);
            return talkToApiResponse($todo, 'Data Updated Successfully!', 202);
        }

        return talkToApiResponse([], 'Data Not Found!', 404, false);
    }



    /**
     * destroy
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::where('ip_address', request()->ip())->where('id', $id)->first();

        if ($todo) {
            $todo->delete();
            return talkToApiResponse([], "Data Deleted Successfully!", 202);
        }

        return talkToApiResponse([], 'Data Not Found!', 404, false);
    }
}
