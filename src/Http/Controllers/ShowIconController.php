<?php

namespace HeaderX\BukuIcons\Http\Controllers;

use HeaderX\BukuIcons\Models\Icon;

class ShowIconController
{
    public function __invoke(Icon $icon)
    {
        return view('buku-icons::blade-icons.show', [
            'icon' => $icon,
            'icons' => $icon->relatedIcons(),
        ]);
    }
}
