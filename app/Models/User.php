<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
  public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'middlename',
        'nickname',
        'gender',
        'country',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
        
    ];
        public function notes()
    {
        return $this->hasMany(Note::class, 'fid_user', 'id_user');
    }
}
