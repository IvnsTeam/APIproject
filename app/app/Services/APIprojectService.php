<?
namespace App\Services;
use Illuminate\Support\Facades\Config;


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
}