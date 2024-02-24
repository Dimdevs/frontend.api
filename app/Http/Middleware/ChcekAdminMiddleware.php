<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class ChcekAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role !== 'super_admin' && $user->role !== 'admin') {
                Alert::error('Akses Gagal' , 'Maaf Anda Tidak Memiliki Akses Masuk.')->flash();
                return redirect()->back();
            }
        } else {
            Alert::error('Akses Gagal' , 'Maaf Anda Tidak Memiliki Akses Masuk.')->flash();
            return redirect()->back();
        }

        return $next($request);
    }
}
