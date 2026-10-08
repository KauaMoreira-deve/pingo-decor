<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BannerController extends Controller
{
    public function index(): View
    {
        $listarBanner = Banner::orderByDesc('id_banner')->get();
        
        return view('admin.banner.index', compact('listarBanner'));
    }
    
    
    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo_banner' => 'required|string|max:50',
            'imagem_banner' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status_banner' => 'required|in:Ativo,Inativo',
        ]);

        $novoArquivo = null;
        try {
            DB::beginTransaction();
            
            $banner = Banner::create([
                'titulo_banner' => $dados['titulo_banner'],
                'imagem_banner' => 'banner/sem-foto.png',
                'status_banner' => $dados['status_banner'],
            ]);
            
            $caminhoRelativo = $this->salvarImagem($request->file('imagem_banner'), $banner);
            $novoArquivo = public_path('pingo-decor/assets/' . $caminhoRelativo);
            
            $banner->update(['imagem_banner' => $caminhoRelativo]);

            DB::commit();

            return redirect()
                ->route('admin.banner.index')
                ->with('sucesso', 'Banner cadastrado com sucesso!');
        } catch (\Throwable $erro) {
            DB::rollBack();
            $this->excluirArquivoFisico($novoArquivo);
            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível cadastrar o banner. Tente novamente.');
        }
    }


    public function update(Request $request, int $id)
    {
        $dados = $request->validate([
            'titulo_banner' => 'required|string|max:50',
            'imagem_banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status_banner' => 'required|in:Ativo,Inativo',
        ]);

        $banner = Banner::findOrFail($id);
        $imagemAntiga = $banner->imagem_banner;
        $novoArquivo = null;

        try {
            DB::beginTransaction();

            $caminhoImagem = $imagemAntiga;

            if ($request->hasFile('imagem_banner')) {
                $caminhoImagem = $this->salvarImagem($request->file('imagem_banner'), $banner, $dados['titulo_banner']);
                $novoArquivo = public_path('pingo-decor/assets/' . $caminhoImagem);
            }

            $banner->update([
                'titulo_banner' => $dados['titulo_banner'],
                'imagem_banner' => $caminhoImagem,
                'status_banner' => $dados['status_banner'],
            ]);

            DB::commit();

            if ($caminhoImagem !== $imagemAntiga) {
                $this->excluirImagem($imagemAntiga);
            }

            return redirect()
                ->route('admin.banner.index')
                ->with('sucesso', 'Banner atualizado com sucesso!');
        } catch (\Throwable $erro) {
            DB::rollBack();
            $this->excluirArquivoFisico($novoArquivo);
            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível atualizar o banner. Tente novamente.');
        }
    }

    public function destroy(int $id)
    {
        try {
            $banner = Banner::findOrFail($id);
            $imagem = $banner->imagem_banner;

            $banner->delete();
            $this->excluirImagem($imagem);

            return redirect()
                ->route('admin.banner.index')
                ->with('sucesso', 'Banner excluído com sucesso!');
        } catch (\Throwable $erro) {
            report($erro);

            return redirect()
                ->back()
                ->with('erro', 'Não foi possível excluir o banner. Tente novamente.');
        }
    }

    private function salvarImagem($imagem, Banner $banner, ?string $titulo = null): string
    {
        $slug = Str::limit(Str::slug($titulo ?? $banner->titulo_banner), 30, '');
        $extensao = strtolower($imagem->getClientOriginalExtension());
        $nomeImagem = $slug . '_' . $banner->id_banner . '_' . Str::lower(Str::random(6)) . '.' . $extensao;
        $pasta = public_path('pingo-decor/assets/banner');

        if (!is_dir($pasta)) {
            mkdir($pasta, 0775, true);
        }

        $imagem->move($pasta, $nomeImagem);

        return 'banner/' . $nomeImagem;
    }

    private function excluirImagem(?string $caminhoRelativo): void
    {
        if (!$caminhoRelativo || !str_starts_with($caminhoRelativo, 'banner/')) {
            return;
        }

        $this->excluirArquivoFisico(public_path('pingo-decor/assets/' . $caminhoRelativo));
    }

    private function excluirArquivoFisico(?string $caminho): void
    {
        if ($caminho && is_file($caminho)) {
            unlink($caminho);
        }
    }
}
