<?php

declare(strict_types=1);

namespace HeaderX\BukuIcons\Http\Livewire;

use HeaderX\BukuIcons\Models\Icon;
use HeaderX\BukuIcons\Models\IconSet;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IconSearch extends Component
{
    public string $search = '';

    public string $set = '';

    protected $queryString = [
        'search' ,
        'set',
    ];

    public function mount(): void
    {
        $this->search = (string) request()->query('search', $this->search);
        $this->set = (string) request()->query('set', $this->set);
    }

    public function resetSearch(): void
    {
        $this->reset('search');
    }

    public function render(): View
    {
        return view('buku-icons::livewire.icon-search', [
            'total' => Icon::query()->withSet($this->set)->count(),
            'icons' => $this->icons(),
            'sets' => IconSet::orderBy('name')->get(),
        ]);
    }

    protected function icons(): Collection
    {
        if ($this->shouldShowRandomIcons()) {
            return Icon::query()
                ->withSet($this->set)
                ->inRandomOrder()
                ->take(80)
                ->get();
        }

        return Icon::search($this->search)
            ->when(! empty($this->set), fn ($query) => $query->where('icon_set_id', $this->set))
            ->take(500)
            ->get();
    }

    protected function shouldShowRandomIcons(): bool
    {
        return empty(trim($this->search));
    }
}
