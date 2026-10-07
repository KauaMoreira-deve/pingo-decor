<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ContatoController extends Controller
{
    public function index(): View
    {
        $listarContato = Contato::orderByDesc('id_contato')->get();

        return view('admin.contato.index', compact('listarContato'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate($this->regras());

        try {
            DB::beginTransaction();
            Contato::create($dados);
            DB::commit();

            return redirect()
                ->route('admin.contato.index')
                ->with('sucesso', 'Contato cadastrado com sucesso!');
        } catch (\Throwable $erro) {
            DB::rollBack();
            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível cadastrar o contato. Tente novamente.');
        }
    }

    public function update(Request $request, int $id)
    {
        $dados = $request->validate($this->regras());

        try {
            DB::beginTransaction();
            $contato = Contato::findOrFail($id);
            $contato->update($dados);
            DB::commit();

            return redirect()
                ->route('admin.contato.index')
                ->with('sucesso', 'Contato atualizado com sucesso!');
        } catch (\Throwable $erro) {
            DB::rollBack();
            report($erro);

            return redirect()
                ->back()
                ->withInput()
                ->with('erro', 'Não foi possível atualizar o contato. Tente novamente.');
        }
    }

    public function destroy(int $id)
    {
        try {
            Contato::findOrFail($id)->delete();

            return redirect()
                ->route('admin.contato.index')
                ->with('sucesso', 'Contato excluído com sucesso!');
        } catch (\Throwable $erro) {
            report($erro);

            return redirect()
                ->back()
                ->with('erro', 'Não foi possível excluir o contato. Verifique se existem orçamentos vinculados.');
        }
    }

    private function regras(): array
    {
        return [
            'nome_contato' => 'required|string|max:60',
            'nome_companheiro_contato' => 'required|string|max:70',
            'nome_idade_criancas_contato' => 'required|string|max:60',
            'email_contato' => 'required|email|max:80',
            'telefone_contato' => 'required|string|max:15',
            'cidade_bairro_contato' => 'required|string|max:32',
            'profissao_contato' => 'required|string|max:80',
            'origem_contato' => 'required|string|max:23',
            'ajuda_contato' => 'required|string|max:47',
            'metragem_contato' => 'required|string|max:70',
            'quantidades_ambientes_contato' => 'required|string|max:14',
            'trimestre_gestacao_contato' => 'required|string|max:37',
            'prazo_contato' => 'required|string|max:15',
            'detalhes_contato' => 'required|string|max:80',
        ];
    }
}
