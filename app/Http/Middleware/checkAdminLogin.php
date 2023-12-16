<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      // nếu user đã đăng nhập
      if (Auth::check())
      {
          $user = Auth::user();
          // nếu user da dang nhap thi cho qua -> admincp
          if ($user)
          {
              return $next($request);
          }
          else
          {
              Auth::logout();
              return redirect()->route('auth.login');
          }
      } else
          return redirect('admincp/login');
    }
}