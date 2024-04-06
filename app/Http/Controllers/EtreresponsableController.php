<?php

namespace App\Http\Controllers;

use App\Models\Etreresponsable;
use App\Models\User;
use App\Formation;
use Illuminate\Http\Request;

/**
 * Class EtreresponsableController
 * @package App\Http\Controllers
 */
class EtreresponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etreresponsables = Etreresponsable::paginate();

        return view('etreresponsable.index', compact('etreresponsables'))
            ->with('i', (request()->input('page', 1) - 1) * $etreresponsables->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etreresponsable = new Etreresponsable();
        $role = User::where('role', 2)->orderBy('name')->get();

        return view ('etreresponsable.create',[
            'users' => $role,
            'formations' => Formation::all(),
        ],
        compact('etreresponsable'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Etreresponsable::$rules);

        $etreresponsable = Etreresponsable::create($request->all());

        return redirect()->route('etreresponsables.index')
            ->with('success', 'Etreresponsable created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etreresponsable = Etreresponsable::find($id);

        return view('etreresponsable.show', compact('etreresponsable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etreresponsable = Etreresponsable::find($id);
        $role = User::where('role', 2)->orderBy('name')->get();

        return view ('etreresponsable.edit',[
            'users' => $role,
            'formations' => Formation::all(),
        ],
        compact('etreresponsable'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Etreresponsable $etreresponsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etreresponsable $etreresponsable)
    {
        request()->validate(Etreresponsable::$rules);

        $etreresponsable->update($request->all());

        return redirect()->route('etreresponsables.index')
            ->with('success', 'Etreresponsable updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $etreresponsable = Etreresponsable::find($id)->delete();

        return redirect()->route('etreresponsables.index')
            ->with('success', 'Etreresponsable deleted successfully');
    }
}
