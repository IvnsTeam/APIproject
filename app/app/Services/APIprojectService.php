<?
namespace App\Services;
use Illuminate\Support\Facades\Config;


class APIprojectService
{

    public function __construct()
    {
        $apiKey = Config::get('apiproject.api_key');
        $apiUrl = Config::get('apiproject.api_url');
    }


    public function doSomething()
    {
        return array(
            "test1" => "test1-1",
            "test2" => "test2-1",
            "test3" => "test3-1",
        );
    }
}


$API = new APIprojectService();