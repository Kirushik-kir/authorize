<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = new UserResource($user);
        //return view('home', compact('data'));
        return $data;
    }
}
