<?php

namespace Jackmarshall\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfHasNoPermission
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    
    protected $bindings = ['tournament', 'game', 'round', 'report', 'map', 'player'];

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {		
        if ($this->auth->guest()) {
			return $this->deny($request);
        }
        
        foreach($this->bindings as $bind) {
			if(!$request->has($bind)) {
				return $this->deny($request);
			}
			if(!method_exists($bind, 'user') {
				return $this->deny($request);
			}
			if($bind->user->id != $this->auth->id) {
				return $this->deny($request);
			}
        }

        return $next($request);
    }
    
    protected function deny($request)
    {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('auth.login'));
            }
    }
}
