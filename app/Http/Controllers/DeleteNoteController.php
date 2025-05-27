<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeleteNoteController extends Controller
{
    public function deleteNote($id)
{
    $note = Note::find($id);

    if (!$note) {
        return response()->json(['error' => 'Note not found'], 404);
    }

    $note->delete();

    return response()->json(['message' => 'Note deleted'], 200);
}

}
