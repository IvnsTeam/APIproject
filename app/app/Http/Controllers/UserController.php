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

class UserController extends Controller
{
    protected $APIproject;
    public function __construct(APIprojectService $APIproject){
        $this->APIproject = $APIproject;

        $this->settings = $this->APIproject->GetApiSettings();
    }

    public function CreateNewUser(Request $request){

        try {
            $validatedData = $request->validate([
                // 'user_type' => ['required', 'string', 'max:255', Rule::in(["user", "admin"])],
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'string', 'max:255'],
                'organization_id' => ['nullable', 'string', 'max:255'],
            ]);
        } catch (ValidationException $e) {
            return response()->json();
        };

        $result = DB::table('users')->insert([
            'user_type' => "user",
            'name' => $validatedData["name"],
            'surname' => $validatedData["surname"],
            'email' => $validatedData["email"],
            'password' => bcrypt($validatedData["password"]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'remember_token' => Str::random(60),
            'organization_id' => isset($validatedData["organization_id"]) ? $validatedData["organization_id"] : null,
        ]);
        
        $response = array(
            "status" => $status = $result ? "success" : "error",
        );

        print_r( json_encode( $response ));
    }

    public function GetUser(){
        $response = User::all();

        $response = DB::table('users')
            ->join('organizations', 'users.organization_id', '=', 'organizations.id')
            ->select('users.*','organizations.name as organization_name')
            ->get();

        print_r( json_encode($response) );
    }
}