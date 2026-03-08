<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaContent extends Model
{
    use HasFactory;

    /**
     * Field yang dapat diisi secara massal.
     */
    protected $fillable = [
        'type',        // 'fasilitas' atau 'galeri'
        'category',    // 'Akademik', 'Olahraga', dll (khusus fasilitas)
        'title',
        'image',
        'description',
        'order'        // Untuk kustomisasi urutan tampilan
    ];

    /**
     * Scope untuk memfilter tipe Fasilitas.
     * Penggunaan: MediaContent::fasilitas()->get();
     */
    public function scopeFasilitas($query)
    {
        return $query->where('type', 'fasilitas');
    }

    /**
     * Scope untuk memfilter tipe Galeri.
     * Penggunaan: MediaContent::galeri()->get();
     */
    public function scopeGaleri($query)
    {
        return $query->where('type', 'galeri');
    }

    /**
     * Accessor untuk mendapatkan URL gambar yang valid.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        return asset('image/assets/default-placeholder.webp');
    }
}