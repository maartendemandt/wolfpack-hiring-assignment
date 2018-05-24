<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wolf;

class WolfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wolfs = Wolf::get();

        return $wolfs->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|alpha',
            'gender'    => 'required|in:male,female',
            'birthday'  => 'required|date_format:Y-m-d',
        ]);

        $wolf = new Wolf();
        $wolf->name     = $request->name;
        $wolf->gender   = $request->gender;
        $wolf->birthday = $request->birthday;
        $wolf->save();

        return $wolf->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->merge(['id' => $id]);

        $request->validate([
            'id'        => 'required|exists:wolves',
        ]);
        
        $wolf = Wolf::findOrFail($id);

        return $wolf->toJson();
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
        // @TODO: implement the update endpoint
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request->merge(['id' => $id]);

        $request->validate([
            'id'        => 'required|exists:wolves',
        ]);

        Wolf::find($id)->delete();
    }
}
