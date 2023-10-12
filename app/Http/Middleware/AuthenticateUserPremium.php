<?php
namespace App\Http\Middleware;

use App\Models\reseps;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUserPremium
{
    public function handle(Request $request, Closure $next): Response
    {
       // mengambil parameter id resep dari route
       $recipeId = $request->route('id');

       // mencari resep dengan id yang sama dengan $recipeId
       $resep = reseps::find($recipeId);

       // jika admin maka bebas masuk ke resep
       if (Auth::user()->role === "admin") {
        return $next($request);
       }

       // jika pembuat resep maka bebas masuk
       if (Auth::user()->id === $resep->User->id) {
        return $next($request);
       } else {

        // untuk user lain
        if ($resep->isPremium === "yes") {
            // jika sudah langganan maka boleh masuk
            if (Auth::user()->status_langganan === "sedang berlangganan") {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'Anda harus berlangganan terlebih dahulu!');
            }
        } else {
            return $next($request);
        }

       }


    }
}
