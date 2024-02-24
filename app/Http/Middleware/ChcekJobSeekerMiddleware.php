<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ChcekJobSeekerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role !== 'job_seeker') {
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
