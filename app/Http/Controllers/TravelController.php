<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelRequest;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index() {
        return view('admin.Pages.travel');
    }

    public function upsert(TravelRequest $request) {
        $travel = Travel::upsertInstance($request);
    }
}
