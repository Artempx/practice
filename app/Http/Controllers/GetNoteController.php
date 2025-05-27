<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GetNoteController extends Controller
{
    public function getnote(Request $request)
    {
        
        $notes = Note::all();
        return response()->json($notes, 200);
    }
}