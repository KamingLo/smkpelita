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
        // Menentukan prefix berdasarkan type. 
        // Jika type 'prestasi', maka prefix jadi 'prestasi'.
        $prefix = match($this->type) {
            'berita' => 'berita',
            'pengumuman' => 'pengumuman',
            'prestasi' => 'prestasi',
            default => 'post',
        };
        
        return url("/{$prefix}/{$this->slug}");
    }

    public function views()
    {
        return $this->hasMany(PostView::class);
    }
}