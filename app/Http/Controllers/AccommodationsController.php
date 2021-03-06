<?php

namespace App\Http\Controllers;

use App\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AccommodationFormRequest;

class AccommodationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Accommodation $accommodation)
    {
        return $accommodation;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accommodations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccommodationFormRequest $request)
    {   
        $accommodation = new Accommodation(array(
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'location_id' => $request->get('location_id'),
        ));

        $accommodation->save();

        return response($accommodation, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Accommodation $accommodation)
    {
        return $accommodation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Accommodation $accommodation)
    {
        $input = Input::json();
        $accommodation->name = $input->get('name');
        $accommodation->description = $input->get('description');
        $accommodation->location_id = $input->get('location_id');

        $accommodation->save();

        return response($accommodation, 200)
                ->header('Content-Type', 'application/json');
    }

    public function search(Request $request, Accommodation $accommodation)
    {
        return $accommodation
            ->where('name', 
                'like',
                '%'.$request->get('name').'%')
            ->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();
        return response('Deleted', 200);
    }
}
