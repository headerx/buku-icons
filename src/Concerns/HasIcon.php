<?php

namespace HeaderX\BukuIcons\Concerns;

use HeaderX\BukuIcons\Actions\FindIconByNameOrIdAction;
use HeaderX\BukuIcons\Models\Icon;

trait HasIcon
{
    public function icon(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    public function setIconIdAttribute($value)
    {
        if ($value) {
            $this->attributes['icon_id'] = ((new FindIconByNameOrIdAction)($value))->id;
        }
    }
}
