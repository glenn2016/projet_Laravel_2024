<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;

/**
 * Class FormationController
 * @package App\Http\Controllers
 */
class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::paginate();

        return view('formation.index', compact('formations'))
            ->with('i', (request()->input('page', 1) - 1) * $formations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formation = new Formation();
        return view('formation.create', compact('formation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Formation::$rules);

        $formation = Formation::create($request->all());

        return redirect()->route('formations.index')
            ->with('success', 'Formation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = Formation::find($id);

        return view('formation.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation = Formation::find($id);

        return view('formation.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formation $formation)
    {
        request()->validate(Formation::$rules);

        $formation->update($request->all());

        return redirect()->route('formations.index')
            ->with('success', 'Formation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $formation = Formation::find($id)->delete();

        return redirect()->route('formations.index')
            ->with('success', 'Formation deleted successfully');
    }
}
