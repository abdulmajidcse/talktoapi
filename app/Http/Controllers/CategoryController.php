<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{    
    /**
     * index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::where('user_id', auth()->id())->latest('id')->get();
        return response()->json($this->data);
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
        
        Category::create([
            'user_id' => auth()->id(),
            'name'    => $request->input('name'),
        ]);

        return response()->json(['success' => 'Category saved.']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['category'] = Category::where('user_id', auth()->id())->where('id', $id)->first();
        return response()->json($this->data);
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
        
        $category = Category::where('user_id', auth()->id())->where('id', $id)->first();
        
        if($category) {
            $category->update([
                'name' => $request->input('name'),
            ]);

            return response()->json(['success' => 'Category saved.']);
        }

        return response()->json(['error' => 'Category not found.'], 404);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('user_id', auth()->id())->where('id', $id)->first();
        
        if($category) {
            $category->delete();
            return response()->json(['success' => 'Category deleted.']);
        }

        return response()->json(['error' => 'Category not found.'], 404);
    }
}