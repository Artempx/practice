<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditNoteController extends Controller
{
    public function editNote(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'id' => 'required|integer|exists:notes,id',
        'text' => 'required|string',
        'date' => 'required|date',
    ]);

    if($validator->fails()){
        return response()->json($validator->errors(),422);
    }
    $note = Note::find($request->id);
    $note->text = $request->text;
    $note->date = $request->date;
    $note->save();

    return response()->json(['message' => 'Note edited'], 200);
    }
}