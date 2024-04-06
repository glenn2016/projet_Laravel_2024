<?php

namespace App\Http\Controllers;

use App\Models\Evaluer;
use App\Models\Ec;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class EvaluerController
 * @package App\Http\Controllers
 */
class EvaluerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluers = Evaluer::paginate();
        /*

        $niveauclasses = Niveauclass::join('formations', 'niveauclasses.formation_id', '=', 'formations.id')
        ->select('niveauclasses.id', 'niveauclasses.libelle as niveau_nom', 'formations.libelle as formation_nom')
           ->paginate();

        $evaluers = Evaluer::join('users', 'evaluers.user_id', '=', 'users.id')
         ->select('evaluers.id', 'evaluers.libelle as evaluer_nom', 'users.name as user_nom')
            ->paginate();
            */


        return view('evaluer.index', compact('evaluers'))
            ->with('i', (request()->input('page', 1) - 1) * $evaluers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaluer = new Evaluer();
        $role = User::where('role', 3)->orderBy('name')->get();;

        
        return view ('evaluer.create',[
            'users' => $role,
            'ecs' => Ec::all(),
        ],
        compact('evaluer'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Evaluer::$rules);

        $evaluer = Evaluer::create($request->all());

        return redirect()->route('evaluers.index')
            ->with('success', 'Evaluer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluer = Evaluer::find($id);

        return view('evaluer.show', compact('evaluer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluer = Evaluer::find($id);
        $role = User::where('role', 3)->orderBy('name')->get();;
        
        return view ('evaluer.edit',[
            'users' => $role,
            'ecs' => Ec::all(),
        ],
        compact('evaluer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Evaluer $evaluer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluer $evaluer)
    {
        request()->validate(Evaluer::$rules);

        $evaluer->update($request->all());

        return redirect()->route('evaluers.index')
            ->with('success', 'Evaluer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $evaluer = Evaluer::find($id)->delete();

        return redirect()->route('evaluers.index')
            ->with('success', 'Evaluer deleted successfully');
    }
}
