<?php

namespace App\Http\Controllers;

use App\Models\Brewery;
use DB;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CervejaController extends Controller
{
    public function index(Request $request) 
    {
        //$cervejas = ['Brahma', 'Kayser', 'Polar', 'Antártica', 'Amstel', 'Heineken'];
        //$cervejarias = Brewery::has('beers', '>', 0)->withCount('beers')->paginate(4);

        $pesquisa = $request->get('pesquisa');

        //dd($request);
        $query = Brewery::has('beers', '>', 0)->withCount('beers');

        if($pesquisa)
        {
            $query->where('country', 'like', '%'. $pesquisa . '%');
        }
        
        $cervejarias = $query->paginate(5)->withQueryString();

        return Inertia::render('Cervejas/Index', compact('cervejarias'));
        //return this.$inertia.replace(this.route('cervejarias-index', {pesquisa: this.pesquisa}));
    }
}
