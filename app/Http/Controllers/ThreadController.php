<?php

namespace App\Http\Controllers;

use App\Models\KomentarTable;
use App\Models\LikeTable;
use App\Models\ReplyKomentarTable;
use App\Models\ThreadTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{

    public function index()
    {
        $thread = ThreadTable::with('user')->get();

        return view ('thread.views.index_thread')
        ->with('thread', $thread);
    }


    public function create()
    {
        return view ('thread.views.create_thread');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'konten' => 'required|string',
        ]);

        $user_id = Auth::id();

        ThreadTable::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'konten' => $request->konten,
        ]);

        return redirect()->route('index.thread')->with('status', 'Thread created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thread = ThreadTable::findOrFail($id);
        return view('thread.views.show_thread')->with('thread', $thread);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function add_komentar(Request $request, string $id){
        $request->validate([
            'komentar' => 'required|string',
        ]);
        KomentarTable::create([
            'thread_id' => $id,
            'user_id' => Auth::id(),
            'komentar' => $request->komentar,
        ]);
        return redirect()->back();
    }

    public function delete_komentar($id)
    {
        $komentar = KomentarTable::find($id);
        if ($komentar && $komentar->user_id == Auth::id()) {
            $komentar->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        }
        return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
    }

    public function add_reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:255',
        ]);

        ReplyKomentarTable::create([
            'komentar_id' => $id,
            'user_id' => Auth::id(),
            'reply' => $request->reply,
        ]);

        return redirect()->back()->with('success', 'Reply added successfully.');
    }

    public function delete_reply($id)
    {
        $reply = ReplyKomentarTable::find($id);

        if ($reply && $reply->user_id == Auth::id()) {
            $reply->delete();
            return redirect()->back()->with('success', 'Reply deleted successfully.');
        }

        return redirect()->back()->with('error', 'You are not authorized to delete this reply.');
    }

    public function like($id)
    {
        $user_id = Auth::id();
        $existingLike = LikeTable::where('thread_id', $id)->where('user_id', $user_id)->first();
        if (!$existingLike) {
            LikeTable::create([
                'thread_id' => $id,
                'user_id' => $user_id,
            ]);
        }
        return redirect()->back();
    }

    public function unlike($id)
    {
        $user_id = Auth::id();
        $existingLike = LikeTable::where('thread_id', $id)->where('user_id', $user_id)->first();

        if ($existingLike) {
            $existingLike->delete();
        }

        return redirect()->back();
    }
}
