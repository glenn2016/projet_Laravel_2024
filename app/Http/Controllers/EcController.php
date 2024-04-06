<?php

namespace App\Http\Controllers;

use App\Models\Ec;
use App\Models\Ue;
use Illuminate\Http\Request;

/**
 * Class EcController
 * @package App\Http\Controllers
 */
class EcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecs = Ec::join('ues', 'ecs.ues_id', '=', 'ues.id')
        ->select('ecs.id', 'ecs.libelle as ecs_nom', 'ues.libelle as ues_nom')
           ->paginate();

        return view('ec.index', compact('ecs'))
            ->with('i', (request()->input('page', 1) - 1) * $ecs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ec = new Ec();

        return view ('ec.create',
        ['ues' => Ue::all()],
        compact('ec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ec::$rules);

        $ec = Ec::create($request->all());

        return redirect()->route('ecs.index')
            ->with('success', 'Ec created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ec = Ec::find($id);

        return view('ec.show', compact('ec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ec = Ec::find($id);


        return view ('ec.edit',
        ['ues' => Ue::all()],
        compact('ec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ec $ec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ec $ec)
    {
        request()->validate(Ec::$rules);

        $ec->update($request->all());

        return redirect()->route('ecs.index')
            ->with('success', 'Ec updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ec = Ec::find($id)->delete();

        return redirect()->route('ecs.index')
            ->with('success', 'Ec deleted successfully');
    }
}
