<?php

namespace App\Http\Controllers;

use App\Quark;
use Illuminate\Http\Request;

class QuarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quark.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quark  $quark
     * @return \Illuminate\Http\Response
     */
    public function show(Quark $quark)
    {
        return view('quark.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quark  $quark
     * @return \Illuminate\Http\Response
     */
    public function edit(Quark $quark)
    {
        return view('quark.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quark  $quark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quark $quark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quark  $quark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quark $quark)
    {
        //
    }


    public function delete(Quark $quark)
    {
        return view('quark.delete');
    }

}
