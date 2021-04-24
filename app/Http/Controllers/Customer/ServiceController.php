<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\EventService;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function allservice()
    {

        $services = Service::orderBy('id','desc')->get();
        return view('customer.service.all',compact('services'));
    }
    public function showservice()
    {
        $customer = Auth::guard('customer')->user()->id;
        $services = EventService::where('customer_id',$customer)->get();
        return view('customer.service.booked',compact('services'));
    }
    public function addservice($id)
    {


     $eventservice = new EventService;

     $service = Service::find($id);

     $eventservice->customer_id = Auth::guard('customer')->user()->id;
     $eventservice->service_id = $service->id;
     $eventservice->service_name = $service->name;
     $eventservice->capacity = $service->capacity;
     $eventservice->pricerange = $service->pricerange;

     $eventservice->save();




        session()->flash('success','Service has been Added');
        return back();
    }
    public function deleteservice($id)
    {
        $service=EventService::find($id);
        if(!is_null($service)){
            $service->delete();
        }
        session()->flash('success','Service has been deleted');
        return back();
    }
}
