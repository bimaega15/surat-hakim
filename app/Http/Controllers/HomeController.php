<?php

namespace App\Http\Controllers;

use App\Models\FormSurat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $formSurat = FormSurat::all();
        return view('one.home.index', compact('formSurat'));
    }
}
