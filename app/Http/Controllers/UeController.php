<?php

namespace App\Http\Controllers;

use App\Models\Ue;
use App\Models\Niveauclass;
use Illuminate\Http\Request;

/**
 * Class UeController
 * @package App\Http\Controllers
 */
class UeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ues = Ue::join('niveauclasses', 'ues.niveauclasse_id', '=', 'niveauclasses.id')
        ->select('ues.id', 'ues.libelle as ues_nom', 'niveauclasses.libelle as niveauclasse_nom')
           ->paginate();

        return view('ue.index', compact('ues'))
            ->with('i', (request()->input('page', 1) - 1) * $ues->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ue = new Ue();

        return view ('ue.create',
        ['niveauclasses' => Niveauclass::all()],
        compact('ue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ue::$rules);

        $ue = Ue::create($request->all());

        return redirect()->route('ues.index')
            ->with('success', 'Ue created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ue = Ue::find($id);

        return view('ue.show', compact('ue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ue = Ue::find($id);

        return view ('ue.edit',
        ['niveauclasses' => Niveauclass::all()],
        compact('ue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ue $ue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ue $ue)
    {
        request()->validate(Ue::$rules);

        $ue->update($request->all());

        return redirect()->route('ues.index')
            ->with('success', 'Ue updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ue = Ue::find($id)->delete();

        return redirect()->route('ues.index')
            ->with('success', 'Ue deleted successfully');
    }
}
