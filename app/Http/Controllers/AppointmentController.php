<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointements = $this->appointements();
       return view ('doctor.appointement' , ['appointements' => $appointements]);
    }

    public function appointements () {
        $doctorId = Auth::id();
        return Appointment::with('Patient' , 'doctor')->where('doctor_id' , $doctorId)->get();
    }
    public function store(Request $request)
    {
        $doctor_id = $request->input('doctor_id');
        $patientId = Auth::id();
        $time_slot = $request->input('time_slot');
        $currentDate = Carbon::now()->format('Y-m-d');


        Appointment::create([
            'doctor_id' => $doctor_id,
            'patient_id' => $patientId,
            'time_slot' => $time_slot,
            'appointement_date' => $currentDate
        ]);


        return redirect()->back();

    }

}
