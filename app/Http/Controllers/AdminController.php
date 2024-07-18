<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
class AdminController extends Controller
{

 public function destroy(Website $website)
    {
        $website->delete();
        return redirect()->back();
    }
}


