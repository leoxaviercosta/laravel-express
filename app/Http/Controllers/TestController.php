<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{
    public function index($nome) {
        return view('test.index', ['nome' => $nome]);
    }

    public function notas() {
        $notas = array(
            "Anotação 1",
            "Anotação 2",
            "Anotação 3",
            "Anotação 4",
            "Anotação 5",
        );

        return view('test.notas', compact('notas')); // compact gera um array com o valor
    }
}
