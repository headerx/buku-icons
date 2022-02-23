<?php

namespace HeaderX\BukuIcons\Actions;

use HeaderX\BukuIcons\Models\Icon;

class FindIconByNameOrIdAction
{
    /**
     * Return first icon matching input
     * by class, html, or id. Never
     * empty. Returns default icon
     * in null case, creates icon
     * if there is no match
     *
     * @param mixed $icon
     * @return int
     */
    public function __invoke($icon, $meta = null): Icon
    {
        // Leave early if there is no icon
        // todo make no image icon configurable
        if (! $icon) {
            return Icon::query()->where('name', 'heroicon-o-x')->first();
        }


        if (is_numeric($icon)) {
            return Icon::query()->find($icon) ? Icon::query()->find($icon) : Icon::query()->where('name', 'heroicon-o-x')->first();
        }

        $icon = Icon::query()->where('name', $icon)->first() ?? Icon::query()->where('name', 'heroicon-o-x')->first();

        return $icon;
    }
}
