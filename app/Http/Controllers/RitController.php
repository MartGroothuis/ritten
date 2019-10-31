<?php

namespace App\Http\Controllers;

use Auth;
use App\Rit;
use Illuminate\Http\Request;

class RitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rits = Rit::where('user_id', '=', Auth::id())->orderBy('created_at', 'desc')->Paginate(8);
        return view('ritten.index', compact('rits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastRit = Rit::where('user_id', '=', Auth::id())->orderBy('created_at', 'desc')->first();
        if (!$lastRit) {
            $$lastRit = '';
        }
        return view('ritten.create', compact('lastRit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $request->retour = request('retour') == 'on' ? 1 : 0;
        $request->zakelijk = request('zakelijk') == 'on' ? 1 : 0;

        $request->validate([
            'van' => 'required|min:3|max:255|regex:/^[a-zA-Z ]+$/',
            'naar' => 'required|min:3|max:255|regex:/^[a-zA-Z ]+$/',
            // 'beginstand' => 'required|min:5|max:255',
            'eindstand' => 'required|min:3|max:255',
            'retour' => 'max:3',
            'zakelijk' => 'max:3',
            'omschrijving' => 'nullable|max:255|regex:/^[a-zA-Z ]+$/',
        ]);

        $lastRit = Rit::where('user_id', '=', Auth::id())->orderBy('created_at', 'desc')->first();
        if ($lastRit) {
            $beginstand = $lastRit->eindstand;
        } else {
            $beginstand = $request->beginstand;
        }

        $user = new Rit;

        $user->user_id = Auth::id();
        $user->van = $request->van;
        $user->naar = $request->naar;
        $user->beginstand = $beginstand;
        $user->eindstand = $request->eindstand;
        $user->retour = $request->retour;
        $user->zakelijk = $request->zakelijk;
        $user->omschrijving = $request->omschrijving;

        $user->save();

        return redirect('/ritten');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rit  $rit
     * @return \Illuminate\Http\Response
     */
    public function show(Rit $rit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rit  $rit
     * @return \Illuminate\Http\Response
     */
    public function edit(Rit $rit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rit  $rit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rit $rit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rit  $rit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rit $rit)
    {
        //
    }
}
