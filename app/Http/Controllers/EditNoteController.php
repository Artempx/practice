<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class EditNoteController extends Controller
{
    public function editNote(Request $request, $id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['error' => 'Note not found'], 404);
        }

        
        if ($request->has('text')) {
            $request->validate(['text' => 'string']);
            $note->text = $request->text;
        }

        if ($request->has('date')) {
            $request->validate(['date' => 'date']);
            $note->date = $request->date;
        }

        $note->save();

        return response()->json(['message' => 'Note updated'], 200);
    }
}
