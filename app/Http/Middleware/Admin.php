<?php

namespace App\Http\Middleware;
use \Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Admin
{
    protected $auth;

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
        if ($this->auth->user()->Rol != 'ADMINISTRADOR') {
            Session::flash('NoAdmin', 'No puede realizar esta accion');
            return redirect()->to('list/registros-alumnos/');
        }
        return $next($request);
    }
}
