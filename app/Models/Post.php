<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Nova\Actions\Actionable;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, SoftDeletes, Searchable, Actionable;

    protected $fillable = [
        'title',
        'body',
        'is_published',
    ];

    protected $casts = [
        'publish_at' => 'datetime',
        'publish_until' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
