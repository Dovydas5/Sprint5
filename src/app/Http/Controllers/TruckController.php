<?php

namespace App\Http\Controllers;

use App\Mechanic;
use App\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        $trucks = Truck::orderBy('make_year')->get();
        $mechanics = Mechanic::all();
        $selectId = 0;
        if ($request->mechanic_id) {
            $trucks = Truck::where('mechanic_id', $request->mechanic_id)->orderBy('maker')->get();
            $selectId = $request->mechanic_id;
        } else {
            $trucks = Truck::orderBy('maker')->get();
        }
        return view('truck.index', compact('trucks', 'mechanics', 'selectId'));
//        return view('truck.index', ['trucks' => $trucks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanics = Mechanic::all();
        return view('truck.create', ['mechanics' => $mechanics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'truck_maker' => ['required', 'min:3', 'max:64'],
                'truck_plate' => ['required', 'digits:3'],
                'truck_make_year' => ['required', 'digits:4'],
                'truck_mechanic_notices' => ['required', 'min:3', 'max:64'],


            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $truck = new Truck;
        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
        return redirect()->route('truck.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        return view('truck.show', compact('truck'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        $mechanics = Mechanic::all();
        return view('truck.edit', ['truck' => $truck, 'mechanics' => $mechanics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        $validator = Validator::make($request->all(),
            [
                'truck_maker' => ['required', 'min:3', 'max:64'],
                'truck_plate' => ['required', 'digits:3'],
                'truck_make_year' => ['required', 'digits:4'],
                'truck_mechanic_notices' => ['required', 'min:3', 'max:64'],


            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $truck->maker = $request->truck_maker;
        $truck->plate = $request->truck_plate;
        $truck->make_year = $request->truck_make_year;
        $truck->mechanic_notices = $request->truck_mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();
        return redirect()->route('truck.index')->with('success_message', 'Sėkmingai pakeistas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('truck.index')->with('success_message', 'Sekmingai ištrintas.');

    }
}
