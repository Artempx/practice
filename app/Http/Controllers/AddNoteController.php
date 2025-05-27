<?php
namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddNoteController extends Controller
{
public function addNote(Request $request)
{
    $validator = Validator::make($request->all(), [
        'fid_user' => 'required|integer|exists:users,id_user',
        'text' => 'required|string',
        'date' => 'required|date',
    ]);

    if($validator->fails()){
        return response()->json($validator->errors(),422);
    }
    $note= Note::create([
        'fid_user' => $request->fid_user,
        'text' =>$request->text,
        'date' => $request->date,
    ]);

    return response()->json(['message' => 'Note added'], 200);
}
}