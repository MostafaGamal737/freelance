<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\user;
use Session;
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
      if (Auth::check()) {

       $user=user::find(Auth::id());
       if ($user->role !='مدير'&&$user->role !='مدير عام') {
        echo 'u can not enter here ';
        exit;
       }
       session::put('active', 'Dashboard');
        return $next($request);
      }
      return redirect('AdminLogin');
    }

}
