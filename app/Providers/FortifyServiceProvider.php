<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

//        if (RateLimiter::tooManyAttempts('send-message:', $perMinute = 5)) {
//            return "Too many attempts!";
//        }

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            $executed = RateLimiter::attempt(

                'send-message:'.$request->$email,
                $perMinute = 3,
                function() {
                    // Send message...
                },
                $decayRate = 30,
                //SET decay rate to 30 second
            );

            if (! $executed) {
//                return response()
//                    ->json(
//                         'Too many error attempt, Login disabled for 30s',
//                    );
//                $request->session()->flash('flash.bannerStyle', 'success');
                return redirect()->back()->with('blocked','blocked' );
            }


//
////            return Limit::perMinute(5)->by($email.$request->ip());
////            return Limit::perMinute(3)->by($email.$request->ip());
//            return array_filter([
//                config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class, Limit::perMinute(3)->by($email.$request->ip())
//            ]);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
