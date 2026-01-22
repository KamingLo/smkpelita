<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'thumbnail',
        'title',
        'slug',
        'content',
        'view_count',
        'meta_description',
        'meta_keywords',
    ];

    public function getUrlAttribute()
    {
        // Sesuaikan prefix 'berita' atau 'pengumuman' berdasarkan field 'type'
        $prefix = $this->type === 'berita' ? 'berita' : 'pengumuman';
        
        // Pastikan Anda sudah memiliki route yang sesuai di web.php
        return url("/{$prefix}/{$this->slug}");
    }

    // Opsional: Untuk statistik mingguan nanti
    public function views()
    {
        return $this->hasMany(PostView::class);
    }
}