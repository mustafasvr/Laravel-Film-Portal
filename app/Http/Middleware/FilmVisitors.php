<?php

namespace App\Http\Middleware;

use App\Models\FilmVisitors as ModelsFilmVisitors;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilmVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $ipAddress = $request->ip();
        $filmId = $request->route('id'); // Film ID'sini yol parametresinden alın
        
        $existingVisitor = ModelsFilmVisitors::where('ip_address', $ipAddress)->where('film_id', $filmId)->first();

        if (!$existingVisitor) {
            $visitor = new ModelsFilmVisitors();
            $visitor->ip_address = $request->ip();
            $visitor->film_id = $filmId;
            $visitor->user_agent = $request->userAgent();
            $visitor->save();
        }

        return $next($request);

    }
}
