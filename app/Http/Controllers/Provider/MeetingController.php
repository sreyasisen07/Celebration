<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Customer;
use App\Models\Meeting;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;


class MeetingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function showmeeting()
    {
        $provider = Auth::guard('provider')->user()->id;
        $meetings = Meeting::where('provider_id', $provider)->where('status', 'Pending')->get();
        return view('provider.showmeeting',compact('meetings'));
    }




    public function acceptmeeting($id)
    {
     $meeting = Meeting::find($id);
     $meeting->status = 'Approved';
     $meeting->save();


     return redirect()->route('provider.message.send');

    }
    public function showmessage()
    {
        $provider = Auth::guard('provider')->user()->id;
        $meetings = Meeting::where('provider_id', $provider)->where('status', 'Approved')->get();
        return view('provider.showmessage',compact('meetings'));
    }
    public function sendmessage($id,Request $request)
    {
        $provider = Auth::guard('provider')->user()->id;
        $customer = Customer::find($id);
        $message = new Message;
        $message->customer_id = $customer;
        $message->provider_id = $provider;
        $message->messagebody = $request->input('messagebody');

        $message->save();


        return back();
    }
}
