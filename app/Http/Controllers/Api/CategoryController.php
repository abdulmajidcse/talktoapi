<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return talkToApiResponse($validator->getMessageBag(), '', 422, false);
        }

        // check category name is already exist or not
        $categoryExist = Category::where('user_id', auth('api')->id())->where('name', $request->input('name'))->first();
        if ($categoryExist) {
            return talkToApiResponse(['name' => 'The name is already exist.'], '', 422, false);
        }

        $category = Category::create([
            'user_id' => auth('api')->id(),
            'name'    => $request->input('name'),
        ]);

        return talkToApiResponse($category, 'Data Saved Successfully!', 201);
    }

    /**
     * show
     *
     * @param  mixed Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if ($category->user_id == auth('api')->id()) {
            return talkToApiResponse($category->load('posts'));
        }

        return abort(404);
    }

    /**
     * update
     *
     * @param  Illuminate\Http\Request $request
     * @param  mixed Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return talkToApiResponse($validator->getMessageBag(), '', 422, false);
        }

        // check category name is already exist or not
        $categoryExist = Category::where('user_id', auth('api')->id())->where('id', '!=', $category->id)->where('name', $request->input('name'))->first();
        if ($categoryExist) {
            return talkToApiResponse(['name' => 'The name is already exist.'], '', 422, false);
        }

        if ($category->user_id == auth('api')->id()) {
            $category->update([
                'name' => $request->input('name'),
            ]);

            return talkToApiResponse($category, 'Data Updated Successfully!', 202);
        }

        return abort(404);
    }

    /**
     * destroy
     *
     * @param  mixed Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->user_id == auth('api')->id()) {
            $category->delete();
            return talkToApiResponse([], "Data Deleted Successfully!", 202);
        }

        return abort(404);
    }
}
