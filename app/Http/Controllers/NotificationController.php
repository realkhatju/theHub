<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //notification index
    public function index(){
        return view('admin.notification.index');
    }
}
