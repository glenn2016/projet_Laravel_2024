<?php

namespace App\Http\Controllers;

use App\Models\Niveauclass;
use App\Formation;
use Illuminate\Http\Request;

/**
 * Class NiveauclassController
 * @package App\Http\Controllers
 */
class NiveauclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $niveauclasses = Niveauclass::join('formations', 'niveauclasses.formation_id', '=', 'formations.id')
         ->select('niveauclasses.id', 'niveauclasses.libelle as niveau_nom', 'formations.libelle as formation_nom')
            ->paginate();
    
        return view('niveauclass.index', compact('niveauclasses'))
            ->with('i', (request()->input('page', 1) - 1) * $niveauclasses->perPage());
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveauclass = new Niveauclass();

        return view ('niveauclass.create',
         ['formations' => Formation::all()],
         compact('niveauclass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Niveauclass::$rules);

        $niveauclass = Niveauclass::create($request->all());

        return redirect()->route('niveauclasses.index')
            ->with('success', 'Niveauclass created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $niveauclass = Niveauclass::find($id);

        return view('niveauclass.show', compact('niveauclass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $niveauclass = Niveauclass::find($id);

        return view ('niveauclass.edit',
        ['formations' => Formation::all()],
        compact('niveauclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Niveauclass $niveauclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Niveauclass $niveauclass)
    {
        request()->validate(Niveauclass::$rules);

        $niveauclass->update($request->all());

        return redirect()->route('niveauclasses.index')
            ->with('success', 'Niveauclass updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $niveauclass = Niveauclass::find($id)->delete();

        return redirect()->route('niveauclasses.index')
            ->with('success', 'Niveauclass deleted successfully');
    }


}

