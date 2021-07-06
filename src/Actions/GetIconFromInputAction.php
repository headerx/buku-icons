<?php

namespace HeaderX\BukuIcons\Actions;

use Exception;
use HeaderX\BukuIcons\Concerns\FiltersData;
use HeaderX\BukuIcons\Models\Icon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GetIconFromInputAction
{
    use FiltersData;

    public FindIconByNameOrIdAction $findIconByNameOrIdAction;

    public function __construct(
        FindIconByNameOrIdAction $findIconByNameOrIdAction
    ) {
        $this->findIconByNameOrIdAction = $findIconByNameOrIdAction;
    }

    public function __invoke($data) : Icon
    {
        Validator::make($data, [
            'icon_id' => ['required'],
            'meta' => ['string', 'nullable'],
        ])->validateWithBag('createIconForm');

        $data = $this->filterData($data);

        $input = $data['icon_id'] ?? null;

        $meta = $data['name'] ?? null;

        DB::beginTransaction();

        try {
            $icon = ($this->findIconByNameOrIdAction)($input, $meta);
        } catch (Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());
        }

        DB::commit();

        return $icon;
    }
}
