<?php

namespace App\Http\Controllers;
use App\Models\SMS;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $success=SMS::where('status' , true)->count();
        $failed=SMS::where('status' , false)->count();
        return view('status' , ["success" => $success, "failed" => $failed]);
    }
}
