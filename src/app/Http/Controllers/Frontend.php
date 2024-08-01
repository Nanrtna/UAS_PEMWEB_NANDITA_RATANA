<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Footer;
use App\Models\Menu;
use App\Models\Category;

class Frontend extends Controller
{
    //
    public function home(){
        $modelfooter = New Footer;
        $datafooter = $modelfooter->get();

        // Ambil semua kategori dengan menu terkait
        $categories = Category::with('menus')->get();

        return view('frontend.index', compact('categories', 'datafooter'));
    }

    public function footer(){
        $modelfooter = New Footer;
        $datafooter = $modelfooter->get();

        return view ('frontend.index', compact('datafooter'));
    }
}
