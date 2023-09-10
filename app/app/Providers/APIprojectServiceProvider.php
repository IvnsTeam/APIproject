<?
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\APIprojectService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class APIprojectServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(APIprojectService::class, function ($app) {
            return new APIprojectService();
        });
    }

    public function boot()
    {
        Validator::extend('password_match', function ($attribute, $value, $parameters, $validator) {         
            $password = $parameters[0];
            $email = $parameters[1];

            $response = DB::table('users')
                ->select('*')
                ->where('email', '=', $email)
                ->get();

            return password_verify($password, $response[0]->password);

        });
    }
}
