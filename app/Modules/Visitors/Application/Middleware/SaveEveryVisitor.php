<?php

namespace App\Modules\Visitors\Application\Middleware;

use App\Modules\Visitors\Domain\Visitor;
use Closure;
use Illuminate\Support\Facades\Auth;

class SaveEveryVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::user()) {
        	Visitor::create([
        		'ip' => $request->ip(),
		        'url' => $request->fullUrl(),
		        'user_id' => Auth::id()
	        ]);
        }else {
	        Visitor::create([
		        'ip' => $request->ip(),
		        'url' => $request->fullUrl()
	        ]);
        }

        return $next($request);
    }
}
