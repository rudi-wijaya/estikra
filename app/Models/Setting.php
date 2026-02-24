<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['key', 'value', 'label', 'group'];

    /**
     * Ambil nilai setting berdasarkan key, dengan fallback jika tidak ada.
     */
    public static function get(string $key, string $default = ''): string
    {
        return Cache::rememberForever("setting_{$key}", function () use ($key, $default) {
            return static::where('key', $key)->value('value') ?? $default;
        });
    }

    /**
     * Simpan nilai setting dan bersihkan cache.
     */
    public static function set(string $key, string $value): void
    {
        static::where('key', $key)->update(['value' => $value]);
        Cache::forget("setting_{$key}");
    }
}
