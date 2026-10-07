<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Publicacoes;
use Illuminate\View\View;

class PublicacoesController extends Controller
{
    public function index(): View
    {
        $publicacoesDinamicas = Publicacoes::orderByDesc('data_publicacoes')->get();

        return view('site.publicacoes.publicacoes', compact('publicacoesDinamicas'));
    }
}
