<?php

declare(strict_types=1);

namespace HeaderX\BukuIcons\Http\Controllers;

use HeaderX\Models\Icon;

class ShowIconController
{
    public function __invoke(Icon $icon)
    {
        return view('blade-icons.show', [
            'icon' => $icon,
            'icons' => Icon::relatedIcons($icon),
        ]);
    }
}
