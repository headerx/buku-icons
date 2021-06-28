<?php

declare(strict_types=1);

namespace HeaderX\BukuIcons\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Laravel\Scout\Searchable;

class Icon extends Model
{
    // use Searchable;

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'keywords' => 'array',
    ];

    /**
     * Get the migration connection name.
     *
     * @return string|null
     */
    public function getConnectionName()
    {
        return config('buku-icons.db_connection');
    }

    public function set(): BelongsTo
    {
        return $this->belongsTo(IconSet::class, 'icon_set_id');
    }

    public function relatedIcons(): Collection
    {
        $query = $this->query();

        foreach (($this->keywords ?? []) as $keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        return $query->get()->where('', '!=', $this->id);
    }

    public function scopeSearch($query, $term)
    {
        $query->where('id', 'like', '%' . $term . '%')
            ->orWhere('icon_set_id', 'like', '%' . $term . '%')
            ->orWhere('keywords', 'like', '%' . $term . '%');
    }

    public function scopeWithSet(Builder $query, string $set): Builder
    {
        return $query->when(! empty($set), fn ($query) => $query->where('icon_set_id', $set));
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }
}
