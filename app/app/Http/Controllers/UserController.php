<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// custom service
use App\Services\APIprojectService;

class UserController extends Controller
{
    protected $APIproject;
    public function __construct(APIprojectService $APIproject){
        $this->APIproject = $APIproject;
    }


    public function CreateNewUser(){
        $response = $this->APIproject->doSomething();
        return view('JsonEncode', compact('response'));
    }
    public function GetUser(){
        $response = User::all();
        return view('JsonEncode', compact('response'));
    }
}