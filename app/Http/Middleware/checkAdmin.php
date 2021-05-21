<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\user;
class checkAdmin
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
        
        $users = new user;
        $user = user::where('id', '=', $request->session()->get('id_user'))->first();
        if(isset($user->type_id) && $user->type_id == 2)
            return $next($request);
            else
            return redirect('/');

    }
}