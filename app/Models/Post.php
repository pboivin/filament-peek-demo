<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'content_blocks',
        'footer_blocks',
        'is_featured',
        'main_image_upload',
        'main_image_url',
        'published_at',
        'slug',
        'title',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'published_at' => 'datetime',
        'updated_at' => 'datetime',
        'content_blocks' => 'array',
        'footer_blocks' => 'array',
    ];

    public function scopePublished($query)
    {
        return $query
            ->whereNotNull('published_at')
            ->whereDate('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        return $query
            ->published()
            ->where('is_featured', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getMainImage()
    {
        if ($this->main_image_upload) {
            return Storage::url($this->main_image_upload);
        }

        return $this->main_image_url;
    }
}
