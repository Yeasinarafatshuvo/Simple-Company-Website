<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeModel;
use App\Models\MultiPicture;

use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $homeAbout = HomeModel::latest()->get();
        return view('admin.home.index', compact('homeAbout'));
    }

    public function AddAbout()
    {
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request)
    {
        HomeModel::insert([
            'title' => $request->title,
            'short_dis' => $request->short_des,
            'long_dis' => $request->long_desc,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About Inserted Successfully');

    }

    public function protfolio()
    {
        $images = MultiPicture::all();
        
        return view('pages.protfolio', compact('images'));
    }
}
