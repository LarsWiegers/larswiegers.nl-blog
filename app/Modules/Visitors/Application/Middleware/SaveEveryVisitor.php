<?php

namespace App\Modules\Visitors\Application\Middleware;

use App\Modules\Visitors\Domain\IsHome;
use Closure;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        try {
            if (Auth::user()) {
                IsHome::create([
                    'ip' => $request->ip(),
                    'url' => $request->fullUrl(),
                    'user_id' => Auth::id()
                ]);
            } else {
                IsHome::create([
                    'ip' => $request->ip(),
                    'url' => $request->fullUrl()
                ]);
            }
        } catch (QueryException $e) {
            if (Auth::user()) {
                Log::emergency("Tried to log the visitor " . $request->ip() . "");
            } else {
                Log::emergency("Tried to log the visitor " . $request->ip() . " for url: " . $request->fullUrl());
            }
        }

        return $next($request);
    }
}
