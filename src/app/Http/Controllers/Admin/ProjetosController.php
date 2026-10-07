<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projetos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjetosController extends Controller
{
    public function index(): View
    {
        $listarProjetos = Projetos::orderByDesc('id_projetos')->get();

        return view('admin.projetos.index', compact('listarProjetos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome_projetos' => 'required|string|max:30',
            'imagem_projetos' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status_projetos' => 'required|in:Ativo,Inativo',
        ]);

        $novoArquivo = null;

        try {
            DB::beginTransaction();

            $projeto = Projetos::create([
                'nome_projetos' => $dados['nome_projetos'],
                'imagem_projetos' => 'projetos/sem-foto.png',
                'status_projetos' => $dados['status_projetos'],
            ]);

            $caminhoRelativo = $this->salvarImagem($request->file('imagem_projetos'), $projeto);
            $novoArquivo = public_path('pingo-decor/assets/' . $caminhoRelativo);
            $projeto->update(['imagem_projetos' => $caminhoRelativo]);

            DB::commit();

            return redirect()
                ->route('admin.projetos.index')
                ->with('sucesso', 'Projeto cadastrado com sucesso!');
        } catch (\Throwable $erro) {
            DB::rollBack();
            $this->excluirArquivoFisico($novoArquivo);
            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível cadastrar o projeto. Tente novamente.');
        }
    }

    public function update(Request $request, int $id)
    {
        $dados = $request->validate([
            'nome_projetos' => 'required|string|max:30',
            'imagem_projetos' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status_projetos' => 'required|in:Ativo,Inativo',
        ]);

        $projeto = Projetos::findOrFail($id);
        $imagemAntiga = $projeto->imagem_projetos;
        $novoArquivo = null;

        try {
            DB::beginTransaction();

            $caminhoImagem = $imagemAntiga;

            if ($request->hasFile('imagem_projetos')) {
                $caminhoImagem = $this->salvarImagem($request->file('imagem_projetos'), $projeto, $dados['nome_projetos']);
                $novoArquivo = public_path('pingo-decor/assets/' . $caminhoImagem);
            }

            $projeto->update([
                'nome_projetos' => $dados['nome_projetos'],
                'imagem_projetos' => $caminhoImagem,
                'status_projetos' => $dados['status_projetos'],
            ]);

            DB::commit();

            if ($caminhoImagem !== $imagemAntiga) {
                $this->excluirImagem($imagemAntiga);
            }

            return redirect()
                ->route('admin.projetos.index')
                ->with('sucesso', 'Projeto atualizado com sucesso!');
        } catch (\Throwable $erro) {
            DB::rollBack();
            $this->excluirArquivoFisico($novoArquivo);
            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível atualizar o projeto. Tente novamente.');
        }
    }

    public function destroy(int $id)
    {
        try {
            $projeto = Projetos::findOrFail($id);
            $imagem = $projeto->imagem_projetos;

            $projeto->delete();
            $this->excluirImagem($imagem);

            return redirect()
                ->route('admin.projetos.index')
                ->with('sucesso', 'Projeto excluído com sucesso!');
        } catch (\Throwable $erro) {
            report($erro);

            return redirect()
                ->back()
                ->with('erro', 'Não foi possível excluir o projeto. Tente novamente.');
        }
    }

    private function salvarImagem($imagem, Projetos $projeto, ?string $nome = null): string
    {
        $slug = Str::limit(Str::slug($nome ?? $projeto->nome_projetos), 30, '');
        $extensao = strtolower($imagem->getClientOriginalExtension());
        $nomeImagem = $slug . '_' . $projeto->id_projetos . '_' . Str::lower(Str::random(6)) . '.' . $extensao;
        $pasta = public_path('pingo-decor/assets/projetos');

        if (!is_dir($pasta)) {
            mkdir($pasta, 0775, true);
        }

        $imagem->move($pasta, $nomeImagem);

        return 'projetos/' . $nomeImagem;
    }

    private function excluirImagem(?string $caminhoRelativo): void
    {
        if (!$caminhoRelativo || !str_starts_with($caminhoRelativo, 'projetos/')) {
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
