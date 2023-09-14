<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\User;

// custom service
use App\Services\APIprojectService;

class TokenController extends Controller
{
    protected $APIproject;
    public function __construct(APIprojectService $APIproject){
        $this->APIproject = $APIproject;

        $this->settings = $this->APIproject->GetApiSettings();
    }

    public function CreateNewApiToken(Request $request){
        try {
            $validatedData = $request->validate([
                'UserEmail' => ['required', 'string', 'max:255', 'exists:users,email'],
                'UserPassword' => ['required', 'string', 'max:255',
                'password_match:'.$request['UserPassword'].",".$request['UserEmail'],
            
            ],
            ]);
        } catch (ValidationException $e) {
            return response()->json();
        };

        $UserData = DB::table('users')
            ->select('id')
            ->where('email', '=', $validatedData["UserEmail"])
            ->get();

        
        $result = DB::table('api_tokens')->insertGetId([
            'issued_user' => $UserData[0]->id,
            'api_token' => $api_token = Str::random(64),
        ]);
        
        $response = array(
            "status" => ($result !== null) ? "success" : "error",
            "api_token" => ($result !== null) ? $api_token : "",
        );

        print_r( json_encode($response));
    }
   
}