<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailTemplate;
use Sentinel;

class EmailTemplateController extends Controller
{
    public function save(Request $request){
   //dd($request->all());
   //$c = str_replace('[name]', 'Hannah', $request->body);

   //dd($c);

   $this->validate($request, [
'subject' => 'required',
'body' => 'required',
'name' => 'required|max:100'
   ]);

   $request->merge([
       'user_id' => Sentinel::getUser()->id
   ]);
   EmailTemplate::create($request->all());

   
return redirect(route('my-template'))->with('success', 'template created successfully');
    }

    public function allTemplate(){
        $emailTemplate = EmailTemplate::whereUser_id(Sentinel::getUser()->id)->orderBy('id', 'desc')->get();
        return view('frontend.template.all-template')->with('template', $emailTemplate);
    }

    public function edit(Request $request, $id){
        $emailTemplate = EmailTemplate::findorfail($id);
        $emailTemplate->update($request->all());
        return redirect(route('my-template'))->with('success', 'Template updated successfully');
    }

    public function editPage($id){
        $emailTemplate = EmailTemplate::findorfail($id);
return view('frontend.template.editTemplate')->with('emailTemplate', $emailTemplate);
    }
}
