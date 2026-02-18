<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of messages with search and filter options
     */
    public function index(Request $request)
    {
        $query = Message::query();

        // Search by name or nomor_hp
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nomor_hp', 'like', "%{$search}%");
        }

        // Filter by read status
        if ($request->input('status') === 'read') {
            $query->whereNotNull('read_at');
        } elseif ($request->input('status') === 'unread') {
            $query->whereNull('read_at');
        }

        $messages = $query->latest()->paginate(15);

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified message
     */
    public function show(Message $message)
    {
        // Mark as read when viewing
        if ($message->read_at === null) {
            $message->update(['read_at' => now()]);
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Mark message as read
     */
    public function markAsRead(Message $message)
    {
        if ($message->read_at === null) {
            $message->update(['read_at' => now()]);
        }

        return back()->with('success', 'Pesan ditandai sudah dibaca');
    }

    /**
     * Remove the specified message from database
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
                       ->with('success', 'Pesan berhasil dihapus');
    }

    /**
     * Save reply to message
     */
    public function reply(Request $request, Message $message)
    {
        $validated = $request->validate([
            'reply_text' => 'required|string|min:10',
        ], [
            'reply_text.required' => 'Isi balasan tidak boleh kosong',
            'reply_text.min' => 'Balasan minimal 10 karakter',
        ]);

        try {
            // Save reply to database
            $message->update([
                'admin_reply' => $validated['reply_text'],
                'replied_at' => now(),
            ]);

            return back()->with('success', '✓ Balasan berhasil disimpan! Anda bisa mengeditnya atau langsung kirim ke WhatsApp.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan balasan: ' . $e->getMessage());
        }
    }

    /**
     * Update existing reply
     */
    public function updateReply(Request $request, Message $message)
    {
        $validated = $request->validate([
            'reply_text' => 'required|string|min:10',
        ], [
            'reply_text.required' => 'Isi balasan tidak boleh kosong',
            'reply_text.min' => 'Balasan minimal 10 karakter',
        ]);

        try {
            // Update reply in database
            $message->update([
                'admin_reply' => $validated['reply_text'],
                'replied_at' => now(),
            ]);

            return back()->with('success', '✓ Balasan berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui balasan: ' . $e->getMessage());
        }
    }
}
