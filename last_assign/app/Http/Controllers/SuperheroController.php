<?php

namespace App\Http\Controllers;

use App\Models\Manufactor;
use App\Models\Superhero;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Superhero::orderBy('id', 'DESC')->get();
        // return view('hero')->with('data', $data);

        $manufactor = Manufactor::all();


        return view('hero', [
            'man' => $manufactor,
            'data'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Superhero::create([
            "name" => $request->name,
            "manufactor_id" => $request->manufactor_id
        ]);

        return [
            'success' => true,
            'message' => 'Hero Sucessfully added :)'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufactor = Manufactor::all();
        $superhero = Superhero::where("id", $id)->first();

        return view('hero-edit', [
            'manufactor' => $manufactor,
            'superhero' => $superhero
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        Superhero::where('id', $id)->update([
            'name' => $request->name,
            'manufactor_id' => $request->manufactor_id
        ]);

        return [
            'success' => true,
            'message' => 'Hero Sucessfully edited ;)'
        ];

        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Superhero::where("id",$id)->delete();

        return [
            'success' => true,
            'message' => 'Hero Sucessfully deleted :('
        ];
    }
}
