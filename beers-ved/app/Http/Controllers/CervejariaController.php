<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Brewery;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CervejariaController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->route('id');

        $cervejaria = Brewery::where('id', $id)->firstOrFail();

        //$cervejas = $cervejaria->beers()->paginate(4);

        $cervejas = $cervejaria->beers()->with('category')->with('style')->paginate(4);

        return Inertia::render('Cervejas/Cervejaria', ['cervejaria' => $cervejaria, 'cervejas' => $cervejas]);
    }

}
