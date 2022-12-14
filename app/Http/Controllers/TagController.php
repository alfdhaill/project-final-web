<?php

namespace App\Http\Controllers;

use App\Models\tag;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tags = tag::paginate(20);

        return view('tags', compact('tags'))->with('i',(request()->input('page', 1) - 1) * 5);
        // return view('tags');
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
            $tag = new tag;
            $tag->name = $request->input('name');
            $tag->admin_id = $request->input('admin_id');
            $tag->description = $request->input('description');
            $tag->save();

            return response()->json([
                'status'=>200,
                'message'=>'Tag added',
            ]);
        }

    }
    public function edit(tag $tag)
    {
        return view('tags.edit',compact('tag'));
    }

    public function update(Request $request, tag $tag)
    {
        $request->validate([

        ]);

        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success','tag updated');
    }

    public function destroy(tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success','Tag deleted');
    }
}
