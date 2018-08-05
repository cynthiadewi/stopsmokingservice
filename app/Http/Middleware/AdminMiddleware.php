<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=\DB::table('users')->select('email')->where('id',auth()->id())->first();
        $user_email=$user->email;
        if(strpos($user_email, '@admin.com') !== false){
            return $next($request);
        }
        else{
            return redirect()->to('/home');
        };
    }
}
