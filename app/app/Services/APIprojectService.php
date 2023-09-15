<?
namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Services\APIprojectService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class APIprojectService
{
    public $apiKey;

    public function __construct()
    {

    }

    public function getUserByToken(){
        $userid = DB::table('api_tokens')
            ->select('*')
            ->where('api_token', '=', $this->apiKey)
            ->get();
    

        $response = DB::table('users')
            ->select('*')
            ->where('id', '=', $userid[0]->accepted_user)
            ->get();

        return $response[0];
    }
}