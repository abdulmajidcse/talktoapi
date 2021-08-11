<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{    
    /**
     * index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('user_id', auth('api')->id())->with('posts')->latest('id')->get();
        return talkToApiResponse($categories);
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
            'name' => 'required|string|unique:categories,name',
        ]);
        
        $category = Category::create([
            'user_id' => auth('api')->id(),
            'name'    => $request->input('name'),
        ]);

        return talkToApiResponse($category, 'Data Saved Successfully!', 201);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('user_id', auth('api')->id())->where('id', $id)->with('posts')->first();
        if ($category) {
            return talkToApiResponse($category);
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
            'name' => 'required|string|unique:categories,name,'.$id,
        ]);
        
        $category = Category::where('user_id', auth('api')->id())->where('id', $id)->first();
        
        if($category) {
            $category->update([
                'name' => $request->input('name'),
            ]);

            return talkToApiResponse($category, 'Data Updated Successfully!', 202);
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
        $category = Category::where('user_id', auth('api')->id())->where('id', $id)->first();
        
        if($category) {
            $category->delete();
            return talkToApiResponse([], "Data Deleted Successfully!", 202);
        }

        return talkToApiResponse([], 'Data Not Found!', 404, false);
    }
}