<?php

namespace App\Http\Controllers;

use App\Quark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class QuarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|max:1000',
            'photo' => 'present',
        ]);

        $quark = new Quark;
        $quark->message = $request->input('message');
        $quark->user_id = Auth::id();
        $quark->parent_id = $request->input('parent_id');
        $quark->photo = $request->input('photo');
        $quark->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Quark $quark
     * @return \Illuminate\Http\Response
     */
    public function show(Quark $quark)
    {
        return view('quark.show', ['quark' => $quark]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Quark $quark
     * @return \Illuminate\Http\Response
     */
    public function edit(Quark $quark)
    {
        return view('quark.edit', ['quark' => $quark]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Quark $quark
     * @return void
     */
    public function update(Request $request, Quark $quark)
    {
        $request->validate([
            'message' => 'required',
        ]);

        // $quark->message = $request->input('message');
        $quark->update(['message' => $request->input('message')]);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Quark $quark
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Quark $quark)
    {
        $quark->delete();
        return redirect()->route('home');
    }
}



