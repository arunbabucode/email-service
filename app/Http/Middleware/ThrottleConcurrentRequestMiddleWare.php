<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Cache;

class ThrottleConcurrentRequestMiddleWare
{
    protected $lock_key = 'throttle-concurrent';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $limit)
    {
        $lock = Cache::lock($this->lock_key, $limit);
        if ($lock->get()) {
            return $next($request);
        } else {
            throw new ThrottleRequestsException('Too Many Attempts.', null);
        }
    }
}
