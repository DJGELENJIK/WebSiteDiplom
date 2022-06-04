<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BotMan;
use Illuminate\Http\Request;

class BotmanController extends Controller
{
    public function index()
    {
        $bot=BotMan::paginate(10);
        return view('auth.botman.index', compact('bot'));
    }

}
