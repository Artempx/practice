<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeleteNoteController extends Controller
{
    public function deleteNote(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'id' => 'required|integer|exists:notes,id',
    ]);

    if($validator->fails()){
        return response()->json($validator->errors(),422);
    }
    $note = Note::find($request->id);
    $note->delete();

    return response()->json(['message' => 'Note deleted'], 200);
    }
}
