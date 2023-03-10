<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdderesController extends Controller
{
    public function index()
    {
        return view("busca");
    }

    public function buscar(Request $request)
    {
        $cep = $request->input("cep");
        $response = Http::get("https://viacep.com.br/ws/$cep/json/")->json();

        if (isset($response["erro"])) {
            return view("busca");
        } else {
            return view("resultado")->with([
                "cep" => $response["cep"],
                "logradouro" => $response["logradouro"],
                "bairro" => $response["bairro"],
                "cidade" => $response["localidade"],
                "estado" => $response["uf"],
            ]);
        }
    }
}
