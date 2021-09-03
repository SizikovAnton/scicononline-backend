<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Poster::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fileUrl = $request->file('file')->storePublicly('posters_files', 'public');
        $fileUrl = asset("storage/" . $fileUrl);

        $input = $request->all();
        $input["file"] = $fileUrl;

        $poster = Poster::create($input);

        return $input;
    }

    /**
     * Display the specified resource.
     *
     * @param  Poster  $poster
     * @return \Illuminate\Http\Response
     */
    public function show(Poster $poster)
    {
        return $poster;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poster $poster)
    {
        // $poster->update($request->all());
    }
}
