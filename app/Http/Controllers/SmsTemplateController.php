<?php

namespace App\Http\Controllers;

use App\SmsTemplate;
use Illuminate\Http\Request;
use Sentinel;

class SmsTemplateController extends Controller
{
    public function index(){
        $smsTemplate = SmsTemplate::where('user_id', Sentinel::getUser()->id)->latest()->paginate(5);
        return view('frontend.sms.index')->with('template', $smsTemplate);
    }

    public function create(){
        return view('frontend.sms.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:100',
            'message' => 'required',
        ]);
        $request->merge([
            'user_id' => Sentinel::getUser()->id
        ]);

        SmsTemplate::create($request->all());
        return redirect()->route('sms.index')->with('success', 'Template created successfully');
    }
}
