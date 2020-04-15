<?php

namespace App\Http\Controllers;

use App\Newsletters;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class NewslettersController extends Controller
{
	public function save(Request $request)
	{
        request()->validate([
            'email' => 'required|email',
        ]);

        try {
            $message = 'Subscribe successfully.';

            $newsletters = new Newsletters;
            $newsletters->setAttribute('newsletters_email', $request->email);
            $newsletters->save();
            return redirect()->back()->with('success_message', $message);
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        return redirect()->back()->with('error_message', $message);
	}
}
