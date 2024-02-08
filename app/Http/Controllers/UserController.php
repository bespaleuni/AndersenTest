<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function sendToDB(Request $request):RedirectResponse {
        $info = new Info;

        $validated = $request->validate([
            'name' => 'required|min:2|max:32',
            'email' => 'required|email|min:7',
            'message' => 'required|min:2|max:65535',
        ]);

        $info->name = $request->name;
        $info->email = $request->email;
        $info->message = $request->message;

        $info->save();

        return redirect('/')->with('status', 'Message sent!');
    }
}
