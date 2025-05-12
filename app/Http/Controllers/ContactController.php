<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.index');
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        try {
            $message = new Message();
            $message->sender_name = $validated['name'];
            $message->sender_email = $validated['email'];
            $message->subject = $validated['subject'];
            $message->body = $validated['message'];
            $message->status = 'unread';
            $message->save();

            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong! Please try again later.');
        }
    }
}
