<?php

namespace App\Http\Controllers;

use App\Classes\SmsProvider;
use App\Models\SMS;
use Illuminate\Http\Request;
class SMSControler extends Controller
{


    public function index(Request $request)
    {
        if ($request->search!=null) {
            $smses = SMS::where("name" , $request->search)->paginate(10);
            return view("welcome",compact('smses'));
        }else {
            $smses=SMS::paginate(10);
            return view("welcome",compact('smses'));
        }

    }

    public function store(Request $request)
    {
        $provider = new SmsProvider();
        $status=true;
        $validated = request()->validate([
            'name' => 'required',
            'number' => 'required',
            'msg' => 'required',
        ]);
        if (isset($request->provider)) {

            if ($request->provider=="provider1"){
                $status=$provider->provider1($request->number , $request->msg);

                if(!$status){
                    $status=$provider->provider2($request->number , $request->msg);
                }
                
            }
            else{
                $status=$provider->provider2($request->number , $request->msg);
                if(!$status){
                    $status=$provider->provider1($request->number , $request->msg);
                }
            }
        }
        else{
            $status=$provider->provider1($request->number , $request->msg);
            if(!$status){
                $status=$provider->provider2($request->number , $request->msg);
            }
            
        }
        $sms = SMS::create([
            'name' => $validated["name"],
            'number' => $validated["number"],
            'msg' => $validated["msg"],
            'status' => $status,
        ]);;
        return redirect("http://127.0.0.1:8000");
    }


    public function show($id)
    {
        $sms = SMS::where("id" , $id)->get();
        $sms = SMS::where("name" , $sms[0]->name)->get();
        return view("messages",compact('sms'));
    }


}
