<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;

class DateVerifyHealthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $config = Config::first();
        if($config->date_registration_selection_health_start <= date('Y-m-d') && $config->date_registration_selection_health_end >= date('Y-m-d')){
            return $next($request);
        }
        return redirect()->route('dashboard.student');
    }
}
