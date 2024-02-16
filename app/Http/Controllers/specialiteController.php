<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class specialiteController extends Controller
{

    public function show()
    {
        $specialities = Specialite::all();

        return view('welcome', compact('specialities'));
    }
    public function create()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nom' => 'required',
          
        ]);

    
        Specialite::create($validatedData);

        return redirect()->route('welcome.index');
    }
    public function destroy($id)
    {
        $speciality = Specialite::findOrFail($id);
        $speciality->delete();

        return redirect('welcome')->with('success', 'Specialty deleted successfully');
    }
}
