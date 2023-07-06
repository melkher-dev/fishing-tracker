<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Requests\TripStoreRequest;

class TripController extends Controller
{
    public function index()
    {
        // return Trip::all();
    }

    public function show($id)
    {
        // return Trip::find($id);
    }

    public function create()
    {
        $fish = Fish::all();

        return inertia('Trips/TripCreate', [
            'fish' => $fish
        ]);
    }

    public function store(TripStoreRequest $request)
    {
        $trip = new Trip();

        $trip->user_id = auth()->user()->id;
        $trip->location = $request->input('location');
        $trip->latitude = $request->input('latitude');
        $trip->longitude = $request->input('longitude');
        $trip->fishing_details = $request->input('fishing_details');
        //'fishing_details' => ['fish_type', 'quantity', 'photo'];
        $trip->duration = $request->input('duration');
        $trip->notes = $request->input('notes');
        $trip->date = $request->input('date');

        $trip->save();

        return $trip->id;
    }

    public function upload(Request $request)
    {
        $path = $request->file('image')->store('public/images');

        return $path;
    }
}
