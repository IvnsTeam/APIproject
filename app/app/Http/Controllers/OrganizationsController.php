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

class OrganizationsController extends Controller
{
    protected $APIproject;
    public function __construct(APIprojectService $APIproject){
        $this->APIproject = $APIproject;

        $this->settings = $this->APIproject->GetApiSettings();
    }

    public function CreateNewOrganization(Request $request){
        try {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:organizations'],
            ]);
        } catch (ValidationException $e) {
            return response()->json();
        };

        $result = DB::table('organizations')->insertGetId([
            'name' => $validatedData["name"],
        ]);
        
        $response = array(
            "status" => ($result !== null) ? "success" : "error",
            "organizations_id" => ($result !== null) ? $result : "",
        );

        print_r( json_encode($response));
    }

    public function GetMyOrganization(Request $request){
        try {
            $validatedData = $request->validate([
                'organizations_id' => ['required', 'string', 'max:255', 'exists:organizations,id'],
            ]);
        } catch (ValidationException $e) {
            return response()->json();
        };

        $result = DB::table('organizations')
            ->select("*")
            ->where('id', $validatedData['organizations_id'])
            ->get();
        
        $response = array(
            "status" => ($result) ? "success" : "error",
            "organization" => ($result && count($result)!=0 ) ? $result : "",
        );

        print_r( json_encode($response));
    }
   

}