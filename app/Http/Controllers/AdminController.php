<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\FirstNotification;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Notification;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addview()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                return view('admin.add_doctor');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $doctor = new doctor;

        // start image  upload function 

        $image = $request->file('image');

        $imagename = time() . '.' . $image->getClientoriginalExtension();

        $request->file('image')->move('doctorimage', $imagename);

        $doctor->image = $imagename;

        //end image upload funtion

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;


        $doctor->save();

        return redirect()->back()->with('message', 'doctor added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_appointment()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {

                $appoints = Appointment::all();

                return view('admin.show_appointment', compact('appoints'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function approved($id)
    {
        $appoints = appointment::find($id);

        $appoints->status = 'approved';

        $appoints->save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $appoints = appointment::find($id);

        $appoints->status = 'canceled';

        $appoints->save();

        return redirect()->back();
    }

    public function showdoctor()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $data = doctor::all();

                return view('admin.show_doctor', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function updatedoctor(Request $request, $id)
    {
        $data = doctor::find($id);

        return view('admin.update_doctor', compact('data'));
    }


    public function deletedoctor($id)
    {
        $data = doctor::find($id);

        $data->delete();

        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editdoctor(Request $request, $id)
    {
        $doctor = doctor::find($id);

        $doctor->name        = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file('image');

        if ($image) {

            $imagename = time() . '.' . $image->getClientoriginalExtension();

            $request->file('image')->move('doctorimage', $imagename);

            $doctor->image = $imagename;
        }

        $doctor->save();

        return redirect()->back()->with('message', 'doctor information updated successfully');
    }

    public function emailview($id)
    {

        $data = Appointment::find($id);

        return view('admin.email_view', compact('data'));
    }

    public function sendemail(Request $request, $id)
    {

        $data = Appointment::find($id);

        $details = [

            'greeting' => $request->greeting,

            'body' => $request->body,

            'actiontext' => $request->actiontext,

            'actionturl' => $request->actionturl,

            'endpart' => $request->endpart,

        ];

        FacadesNotification::send($data, new FirstNotification($details));

        return redirect()->back()->with('message', 'Email sent successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
