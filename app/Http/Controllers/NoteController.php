<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();

        return response()->json($notes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $note = new Note;
        $note->title = $request->title;
        $note->content = $request->content;

        $note->save();

        return response()->json($note, 201);
    }

    public function show(string $id)
    {
        $note = Note::query()->where("id", $id)->first();

        if ($note == null) {
            abort(404);
        }

        return response()->json($note);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => '|string',
        ]);

        $note = Note::query()->where("id", $id)->first();
        $note->title = $request->title;
        $note->content = $request->content;

        $note->update();

        return response()->json($note, 204);
    }

    public function destroy(string $id)
    {
        $note = Note::query()->where("id", $id)->first();

        $note->delete();

        return response()->json($note, 204);
    }
}
