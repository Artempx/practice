<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    public function sync(Request $request)
    {
        $clientNotes = collect($request->input('notes'));
        $response = [
            'updated_from_server' => [],
            'conflicts' => [],
        ];

        foreach ($clientNotes as $clientNote) {
            $serverNote = Note::find($clientNote['id']);

            if (!$serverNote) {
                Note::create([
                    'id' => $clientNote['id'],
                    'fid_user' =>$clientNote['fid_user'],
                    'text' => $clientNote['text'],
                    'date' => $clientNote['date'],
                ]);
                continue;
            }

            $serverHash = hash('sha256', $serverNote->text . $serverNote->date);

            if ($clientNote['hash'] !== $serverHash) {
                $response['conflicts'][] = [
                    'id' => $serverNote->id,
                    'server' => [
                        'text' => $serverNote->text,
                        'date' => $serverNote->date,
                    ],
                    'client' => $clientNote,
                ];
            }
        }

        $clientIds = $clientNotes->pluck('id')->all();
        $missingNotes = Note::whereNotIn('id', $clientIds)->get();
        $response['updated_from_server'] = $missingNotes;

        return response()->json($response);
    }
}
