<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\UserProfile as Profile;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{

    public function index()
    {
        $agencies = User::where('user_type', 'agency')->get();
        // dd($agencies->toArray());
        return view('site.index', compact(['agencies']));
    }

    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {

        if (!isset($request->location) || !isset($request->lat) || !isset($request->lng)) {
            return redirect()->back();
        }

        $agencies  = User::with('profile')->orderBy('id', 'desc')->where('user_type', 'agency')->get();
        $data['agencies'] = [];
        foreach ($agencies as $agency) {
            if ($agency->profile != null) {
                if ($agency->profile->latlng != null) {
                    $latlng = explode(",", $agency->profile->latlng);
                    $distance = ceil(cal_distance($request->lat, $request->lng, $latlng[0], $latlng[1], 'K'));
                    if (intval($distance) <= 50) {
                        $agency->lat = $latlng[0];
                        $agency->lng = $latlng[1];
                        $agency->distance = $distance;
                        array_push($data['agencies'], $agency);
                    }
                }
            }
        }
        $data['search_location'] = $request->location;
        $data['search_lat'] = $request->lat;
        $data['search_lng'] = $request->lng;
        // dd($data['agencies']);
        return view('site.search', ['data' => $data]);
        // dump($request->location . ' lat =>' . $request->lat . ' lat =>' . $request->lng);
    }

    public function agencydetails($id)
    {
        $agency = User::with('agents')->find($id);
        if (!empty($agency)) {
            return view('site.agencies', ['agency' => $agency]);
        } else {
            return redirect()->back();
        }
    }

    public function agentdetails($id)
    {
        $agent = User::with('agency')->find($id);
        if (!empty($agent)) {
            return view('site.agents', ['agent' => $agent]);
        } else {
            return redirect()->back();
        }
    }
}
