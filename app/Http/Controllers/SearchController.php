<?php

namespace Linkzone\Http\Controllers;

use DB;
use Linkzone\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getResults(Request $request)
    {
        $query = $request->get('query');

        if (!$query) return redirect()->route('getHome');

        $users = User::where(DB::raw("CONCAT(fname, ' ', lname)"), 'LIKE', "%{$query}%")
                        ->orWhere('username', 'LIKE', "%{$query}%")
                        ->get();

        return view('search-results', compact('users'));
    }
}
