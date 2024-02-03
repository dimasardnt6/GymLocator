<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gym;
use App\Models\Polygon;

class GymController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $gymLocators = Gym::paginate(5);
        return view('gymLocators.index', [
            'gymLocators' => $gymLocators,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $gymLocators = Gym::where('nama_gym', 'LIKE', "%{$query}%")
                      ->orWhere('alamat', 'LIKE', "%{$query}%")
                      ->get();
        return response()->json($gymLocators);
    }


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Menampilkan form untuk membuat data baru
    public function create()
    {
        return view('gymLocators.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gym = new Gym;
        $gym -> nama_gym = $request -> nama_gym;
        $gym -> alamat = $request -> alamat;
        $gym -> latitude = $request -> latitudeMarker;
        $gym -> longitude = $request -> longitudeMarker;
        $gym -> deskripsi_gym = $request -> deskripsi_gym;
        $gym -> nomor_telepon = $request -> nomor_telepon;
        $gym -> jam_operasional = $request -> jam_operasional;
        $gym -> fasilitas_gym = $request -> fasilitas_gym;
        $gym -> harga_member = $request -> harga_member;
        $gym -> harga_visit = $request -> harga_visit;
        if ($request->hasFile('foto_gym')) {
            $imagePath = $request->file('foto_gym')->store('gym_images', 'public');
            $gym->foto_gym = $imagePath;
        }
        $gym->save();

        $gymId = $gym->id;
        $dataArray = json_decode($request->dataArray);
    
        foreach ($dataArray as $data) {
            $polygon = new Polygon();
            $polygon->gym_id = $gymId;
            $polygon->latitude_polygon = $data[0];
            $polygon->longitude_polygon = $data[1];
            $polygon->save();
        }

        return redirect()->route('gymLocators.index')
            -> with('succes_message','Berhasil menambah data baru');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Menampilkan detail data
    public function show($id)
    {   
        $gyms = Gym::findOrFail($id);
        $polygons = Polygon::where('gym_id', $id)->get();
        return view('gymLocators.show', [
            'gym' => $gyms,
            'polygons' => json_encode($polygons)
        ]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Menampilkan form untuk mengedit data
    public function edit($id)
    {
        $gym = Gym::findOrFail($id);
        $polygons = Polygon::where('gym_id', $id)->get();
        return view('gymLocators.edit', [
            'gym' => $gym,
            'polygons' => json_encode($polygons)
        ]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Memperbarui data
    public function update(Request $request, $id)
    {
        $gym = Gym::findOrFail($id);
        $gym -> nama_gym = $request -> nama_gym;
        $gym -> alamat = $request -> alamat;
        $gym -> latitude = $request -> latitude;
        $gym -> longitude = $request -> longitude;
        $gym -> deskripsi_gym = $request -> deskripsi_gym;
        $gym -> nomor_telepon = $request -> nomor_telepon;
        $gym -> jam_operasional = $request -> jam_operasional;
        $gym -> fasilitas_gym = $request -> fasilitas_gym;
        $gym -> harga_member = $request -> harga_member;
        $gym -> harga_visit = $request -> harga_visit;
        // Update image if provided
        if ($request->hasFile('foto_gym')) {
        // Upload new image
        $imagePath = $request->file('foto_gym')->store('gym_images', 'public');
        $gym->foto_gym = $imagePath;
        }
        $gym->save();

        $gymId = $gym->id;
        $dataArray = json_decode($request->dataArray);
        Polygon::where('gym_id', $gymId )->delete();

        foreach ($dataArray as $data) {
            $polygon = new Polygon();
            $polygon->gym_id = $gymId;
            $polygon->latitude_polygon = $data[0];
            $polygon->longitude_polygon = $data[1];
            $polygon->save();
        }

        return redirect()->route('gymLocators.index')
            -> with('succes_message', 'Berhasil mengupdate data');
    }

    // Menghapus data
    public function destroy($id)
    {
        var_dump($id);
        $gym = Gym::findOrFail($id);
        Polygon::where('gym_id', $id )->delete();
        $gym->delete();

        return redirect()->route('gymLocators.index')
            ->with('succes_message', 'Berhasil menghapus data');
    }
}