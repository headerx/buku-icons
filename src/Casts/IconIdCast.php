<?php

namespace HeaderX\BukuIcons\Casts;

use HeaderX\BukuIcons\Actions\FindIconByNameOrIdAction;
use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;

class IconIdCast implements CastsInboundAttributes
{
    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        $metaName = isset($attributes['handle']) ? $attributes['handle'] : ($attributes['name'] ?? null);

        return (new FindIconByNameOrIdAction)($value, $metaName)->id;
    }
}
