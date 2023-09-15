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
        $this->APIproject->apiKey = (isset($_POST["api_token"]) && trim($_POST["api_token"])!="" ) ? $_POST["api_token"] : false;

        if( $this->APIproject->apiKey ){
            $this->UserData = $this->APIproject->getUserByToken();
        };
    }

    public function CreateNewOrganization(Request $request){
        try {
            $validatedData = $request->validate([
                'api_token' => ['required', 'string', 'max:255'],
                'name' => ['required', 'string', 'max:255', 'unique:organizations'],
                'description' => ['nullable', 'string'],
            ]);
        } catch (ValidationException $e) {
            return response()->json();
        };

        // create organization
        $organizationId = DB::table('organizations')->insertGetId([
            'name' => $validatedData["name"],
            'description' => ($validatedData["description"]) ? $validatedData["description"] : "",
        ]);
        // add current user to organization
        $response = DB::table('organization_affiliation')->insertGetId([
            'user_id' => $this->UserData->id,
            'organization_id' => $organizationId,
        ]);

        print_r( json_encode($response) );
    }

    public function GetMyOrganization(Request $request){
        try {
            $validatedData = $request->validate([
                'api_token' => ['required', 'string', 'max:255'],
            ]);
        } catch (ValidationException $e) {
            return response()->json();
        };

        $organizationIds = DB::table('organization_affiliation')
            ->where('user_id', '=', $this->UserData->id)
            ->pluck('organization_id')
            ->toArray();
    
        $response = DB::table('organizations')
            ->whereIn('id', $organizationIds)
            ->get();
        
        print_r( json_encode($response) );
    }
   

}