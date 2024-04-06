<?php

namespace App\Http\Controllers;

use App\Models\Enseigner;
use App\Models\Ec;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class EnseignerController
 * @package App\Http\Controllers
 */
class EnseignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseigners = Enseigner::paginate();

        return view('enseigner.index', compact('enseigners'))
            ->with('i', (request()->input('page', 1) - 1) * $enseigners->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enseigner = new Enseigner();
        $role = User::where('role', 2)->orderBy('name')->get();

        return view ('enseigner.create',[
            'users' => $role,
            'ecs' => Ec::all(),
        ],
        compact('enseigner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Enseigner::$rules);

        $enseigner = Enseigner::create($request->all());

        return redirect()->route('enseigners.index')
            ->with('success', 'Enseigner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enseigner = Enseigner::find($id);

        return view('enseigner.show', compact('enseigner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enseigner = Enseigner::find($id);
        $role = User::where('role', 2)->orderBy('name')->get();

        return view ('enseigner.edit',[
            'users' => $role,
            'ecs' => Ec::all(),
        ],
        compact('enseigner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Enseigner $enseigner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseigner $enseigner)
    {
        request()->validate(Enseigner::$rules);

        $enseigner->update($request->all());

        return redirect()->route('enseigners.index')
            ->with('success', 'Enseigner updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enseigner = Enseigner::find($id)->delete();

        return redirect()->route('enseigners.index')
            ->with('success', 'Enseigner deleted successfully');
    }
}
