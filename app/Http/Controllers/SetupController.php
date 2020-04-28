<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SetupController extends Controller
{
    //
    public function index(){
        Artisan::call('migrate');
        return "Database successfully setup";
    }

}
