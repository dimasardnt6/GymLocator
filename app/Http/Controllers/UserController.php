<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Polygon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function findGym()
    {
        $gymLocators = Gym::all();
        $jsonFilePath = resource_path('json/dataKordinat.json');
        $kabupatens = json_decode(File::get($jsonFilePath), true);
    
        return view('findGym',[
            'gymLocators' => $gymLocators,
            'kabupatens' => $kabupatens,
        ]);
    }

    public function landingPage()
    {
        $gymLocators = Gym::all();
        return view('landingPage',[
            'gymLocators' => $gymLocators,
        ]);
    }

    public function search_gym(Request $request)
    {
        $query = $request->input('query');

        $gymLocators = Gym::where('nama_gym', 'LIKE', "%{$query}%")
                      ->orWhere('alamat', 'LIKE', "%{$query}%")
                      ->get();
        return response()->json($gymLocators);
    }

    public function show($id)
    {   
        $gyms = Gym::findOrFail($id);
        $polygons = Polygon::where('gym_id', $id)->get();
        return view('detailGym', [
            'gym' => $gyms,
            'polygons' => json_encode($polygons)
        ]);
    }
}
