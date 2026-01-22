<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostView extends Model
{
    // Since your migration table name is 'post_views', 
    // Laravel finds it automatically, but we must define fillable fields.
    
    protected $fillable = [
        'post_id',
        'ip_address',
        'viewed_at',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    // Disable timestamps if your migration doesn't have $table->timestamps()
    public $timestamps = false;

    /**
     * Get the post that owns the view.
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}