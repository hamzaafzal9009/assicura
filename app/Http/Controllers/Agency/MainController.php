<?php

namespace App\Http\Controllers\Agency;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('agency.index');
    }

    public function profile($id)
    {
        $agency = User::find($id);
        if (!empty($agency)) {
            return view('agency.profile', compact('agency'));
        }else{
            return redirect()->back()->with('warning', 'Agenct Not Found!');
        }
    }

    public function agents()
    {
        return view('agency.agents');
    }
}
