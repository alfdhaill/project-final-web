<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = category::paginate(20)->withQueryString();
        return view('categories', compact('categories'))->with('i',(request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'admin_id' => 'required',
            'description' => 'max:191'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else
        {
            $category = new category;
            $category->name = $request->input('name');
            $category->admin_id = $request->input('admin_id');
            $category->description = $request->input('description');
            $category->save();

            return response()->json([
                'status'=>200,
                'message'=>'Category added',
            ]);
        }
    }
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([

        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success','Category updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted');
    }
}
