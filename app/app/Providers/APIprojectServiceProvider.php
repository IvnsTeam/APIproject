<?
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\APIprojectService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(APIprojectService::class, function ($app) {
            return new APIprojectService();
        });
    }
}