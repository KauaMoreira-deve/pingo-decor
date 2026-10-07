<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SobreController extends Controller
{
    public function sobre(): View
    {
        return view('site.sobre.sobre');
    }
}
