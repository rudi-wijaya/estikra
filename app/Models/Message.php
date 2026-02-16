<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'nama',
        'name',
        'email',
        'subjek',
        'message',
        'pesan',
        'status',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    // Accessor untuk 'name' yang compatible dengan 'nama'
    public function getNameAttribute()
    {
        return $this->attributes['nama'] ?? $this->attributes['name'] ?? null;
    }

    // Accessor untuk 'message' yang compatible dengan 'pesan'
    public function getMessageAttribute()
    {
        return $this->attributes['pesan'] ?? $this->attributes['message'] ?? null;
    }
}
