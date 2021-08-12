<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'note' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return talkToApiResponse($validator->getMessageBag(), '', 422, false);
        }

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
     *  @param  mixed Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        if ($todo->ip_address == request()->ip()) {
            return talkToApiResponse($todo);
        }

        return abort(404);
    }

    /**
     * update
     *
     * @param  Illuminate\Http\Request $request
     * @param  mixed Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'note' => 'required|string',
            'comment' => 'nullable|string',
        ]);
        
        if ($todo->ip_address == request()->ip()) {
            $todo->update([
                'title' => $request->input('title'),
                'note' => $request->input('note'),
                'comment' => $request->input('comment'),
            ]);
            return talkToApiResponse($todo, 'Data Updated Successfully!', 202);
        }

        return abort(404);
    }



    /**
     * destroy
     *
     * @param  mixed Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if ($todo->ip_address == request()->ip()) {
            $todo->delete();
            return talkToApiResponse([], "Data Deleted Successfully!", 202);
        }

        return abort(404);
    }
}
