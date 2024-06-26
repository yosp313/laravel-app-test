<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();

        return $notes;
    }

    public function store(Request $request)
    {
        $note = new Note;
        $note->title = $request->title;
        $note->content = $request->content;

        $note->save();
    }
}
