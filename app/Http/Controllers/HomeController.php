<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gymLocators = Gym::all();
        $jsonFilePath = resource_path('json/dataKordinat.json');
        $kabupatens = json_decode(File::get($jsonFilePath), true);

        return view('gymLocators.home',[
            'gymLocators' => $gymLocators,
            'kabupatens' => $kabupatens,
        ]);
    }
}
