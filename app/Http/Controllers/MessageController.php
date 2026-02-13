<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        Message::create($validated);

        return redirect('/kontak')->with('success', 'Pesan berhasil dikirim! Terima kasih telah menghubungi kami.');
    }

    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    public function markAsRead(Message $message)
    {
        $message->update(['status' => 'sudah dibaca']);
        return redirect()->route('messages.show', $message)->with('success', 'Pesan ditandai sebagai sudah dibaca.');
    }

    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
