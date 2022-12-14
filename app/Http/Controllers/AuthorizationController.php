<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    // Gate::allows('isAdmin') ? Response::allow() : abort(403);
    // return 'konotl';
    // if (Gate::allows('isAdmin')){
    //     return view('home');
    // }

}
