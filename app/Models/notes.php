<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'Notes';

    // Разрешённые для массового заполнения поля
    protected $fillable = [
        'fid_user',
        'text',
        'date',
    ];

    
    public $timestamps = false;

    
      public function user()
    {
        return $this->belongsTo(User::class, 'fid_user', 'id_user');
    }
}
