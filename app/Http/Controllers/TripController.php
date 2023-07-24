<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fish;
use App\Models\Trip;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\TripStoreRequest;
use Illuminate\Support\Facades\Redirect;

class TripController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $trips = $user->trips()->orderBy('date', 'desc')->get();

        return inertia('Trips/TripsIndex', [
            'trips' => $trips
        ]);
    }

    public function show($id)
    {
        $trip = Trip::find($id);

        return inertia('Trips/TripShow', [
            'trip' => $trip
        ]);
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
        $trip->date = $request->input('date') ?? Carbon::now()->toDateString();

        $trip->save();

        return to_route('trip.show', [
            'id' => $trip->id,
        ]);
    }

    public function upload(Request $request)
    {
        $path = $request->file('image')->store('public/images');

        $path = asset('storage/images/' . basename($path));

        return $path;
    }
}
