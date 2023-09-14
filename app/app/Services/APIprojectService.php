<?
namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Services\APIprojectService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class APIprojectService
{

    public function __construct()
    {
        $apiKey = Config::get('APIsetting.api_key');
        $apiUrl = Config::get('APIsetting.api_url');
    }

    public function GetApiSettings()
    {
        $settings = array(
            "token" => Config::get("APIsetting.api_key"),
            "url" => Config::get("APIsetting.api_url"),
        );
        return $settings;
    }

    public function getUserByToken( string $token ){
        $userid = DB::table('api_tokens')
            ->select('*')
            ->where('api_token', '=', $token)
            ->get();
    

        $response = DB::table('users')
            ->select('*')
            ->where('id', '=', $userid[0]->accepted_user)
            ->get();

        return $response;
    }
}