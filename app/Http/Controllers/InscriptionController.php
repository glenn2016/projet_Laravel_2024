<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\User;
use App\Models\Niveauclass;
use Illuminate\Http\Request;

/**
 * Class InscriptionController
 * @package App\Http\Controllers
 */
class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscriptions = Inscription::paginate();  

        return view('inscription.index', compact('inscriptions'))
            ->with('i', (request()->input('page', 1) - 1) * $inscriptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inscription = new Inscription();
        $role = User::where('role', 3)->orderBy('name')->get();

        return view ('inscription.create',[
            'users' => $role,
            'niveauclasses' => Niveauclass::all(),
        ],
        compact('inscription'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inscription::$rules);

        $inscription = Inscription::create($request->all());

        return redirect()->route('inscriptions.index')
            ->with('success', 'Inscription created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscription = Inscription::find($id);

        return view('inscription.show', compact('inscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscription = Inscription::find($id);
        $role = User::where('role', 3)->orderBy('name')->get();     

        return view ('inscription.edit',[
            'users' => $role,
            'niveauclasses' => Niveauclass::all(),
        ],
        compact('inscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inscription $inscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscription $inscription)
    {
        request()->validate(Inscription::$rules);

        $inscription->update($request->all());

        return redirect()->route('inscriptions.index')
            ->with('success', 'Inscription updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inscription = Inscription::find($id)->delete();

        return redirect()->route('inscriptions.index')
            ->with('success', 'Inscription deleted successfully');
    }
}
