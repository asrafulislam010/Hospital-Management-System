<?php

namespace App\Http\Controllers;

use App\Models\Doctor as ModelsDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\models\User;
use Illuminate\models\Doctor;
use App\models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    { {
            if (Auth::id()) {
                if (Auth::user()->usertype == '0') {
                    $doctor = ModelsDoctor::all();

                    return view('user.home', compact('doctor'));
                } else {
                    return view('admin.home');
                }
            } else {
                return redirect()->back();
            }
        }
    }

    public function index()
    {

        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctor = ModelsDoctor::all();

            return view('user.home', compact('doctor'));
        }

        $doctor = ModelsDoctor::all();

        return view('user.home', compact('doctor'));
    }

    public function appointment(Request $request)
    {

        $data = new appointment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact = $request->contact;
        $data->date = $request->date;
        $data->doctor = $request->doctor;
        $data->message = $request->message;
        $data->status = 'In Progress';
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appointment Request Success. we contact you soon');
    }

    public function my_appointment()
    {

        if (Auth::id()) {

            if (Auth::user()->usertype == 0) {
                $userid = Auth::user()->id;

                $appoint = appointment::where('user_id', $userid)->get();

                return view('user.my_appointment', compact('appoint'));
            }
        } else {

            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {

        $data = appointment::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'your appointment has been cancelled');
    }
}
