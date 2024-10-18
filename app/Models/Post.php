<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\Tags\HasTags;

class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    use HasTags;

    protected $withCount = ['comments'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'image',
        'published_at',
        'featured',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getImage()
    {
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return '/storage/'.$this->image;
    }

    public function getFormattedDate()
    {
        return $this->published_at->format('j F Y');
        //        // Stel de locale in op Nederlands
        //        Carbon::setLocale('nl');
        //
        //        // Veronderstel dat published_at een datum string is
        //        $publishedAt = Carbon::parse($this->published_at);
        //
        //        // Gebruik translatedFormat om de maand in het Nederlands te krijgen
        //        return $publishedAt->translatedFormat('j F Y');
    }

    public function shortBody($words = 30): string
    {
        return Str::words(strip_tags($this->body), $words);
    }

    public function scopePublished($query): void
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query): void
    {
        $query->where('featured', true);
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}
