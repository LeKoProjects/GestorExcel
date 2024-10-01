<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'nome' => 'required|string',
        'email' => 'required|email',
        'cargo' => 'required|string',
        'telefone' => 'required|string',
        'cpf' => 'required|string',
    ]);

    // Salva no banco de dados
    Funcionario::create($data);

    // Salva no Google Planilhas
    $this->salvarNoGooglePlanilhas($data);

    return redirect()->back()->with('success', 'Funcionário cadastrado com sucesso!');
}

private function salvarNoGooglePlanilhas($data)
{
    // Lógica para salvar os dados no Google Planilhas
}

}
