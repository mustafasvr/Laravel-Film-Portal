<?php

namespace App\View\Components\Public;

use Closure;
use App\Models\FilmVisitors;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     */

     public $filmVisitors;

    public function __construct()
    {
        $this->filmVisitors = FilmVisitors::withCount('Film')->with('Film')->with('filmimages')->orderBy('film_count','DESC')->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.public.sidebar');
    }
}
