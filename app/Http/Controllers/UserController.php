<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::paginate(20);

        return view('tags', compact('tags'))->with('i',(request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        // $admin = db::table('users')->get();

        return view('tags.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'address' => 'required',
            'email' => 'required',
            
        ]);

        tag::create($request->all());
        return redirect()->route('tags.index')->with('success','tag added');
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
        return redirect()->route('tags.index')->with('success','tag deleted');
    }
}
