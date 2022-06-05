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

    public function edit(BotMan $bot_men)
    {
        return view('auth.botman.form',compact('bot_men'));
    }

    public function show(BotMan $bot_men)
    {
        return view('auth.botman.show',compact('bot_men'));
    }

    public function destroy(BotMan $bot_men)
    {
        $bot_men->delete();
        return redirect()->route('botman.index');
    }
}
