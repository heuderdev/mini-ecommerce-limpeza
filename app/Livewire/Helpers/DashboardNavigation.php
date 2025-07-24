<?php

namespace App\Livewire\Helpers;

use Illuminate\Support\Facades\Request;
use Livewire\Component;

class DashboardNavigation extends Component
{
    public $currentRouteName;
    public array $routesArray = [
        [
            'name' => 'dashboard',
            'slug' => 'Início',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="text-[#70706e]" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                        </svg>'
        ],
        [
            'name' => 'painel',
            'slug' => 'Usuário',
            'svg' => '<svg  width="28" height="28" fill="currentColor" class="text-[#70706e]" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                </svg>'
        ],
        [
            'name' => 'painel',
            'slug' => 'Produtos',
            'svg' => '<svg width="28" height="28" fill="currentColor" class="text-[#70706e]" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
  <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5z"/>
  <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1z"/>
</svg>'
        ]
    ];
    protected $listeners = ['url.updated' => 'updateCurrentRoute'];

    public function mount(): void
    {
        $this->currentRouteName = Request::route()->getName();
    }

    public function updateCurrentRoute(): void
    {
        $this->currentRouteName = Request::route()->getName();
    }

    public function isActiveRoute($routeName): bool
    {
        return Request::routeIs($routeName);
    }

    public function render()
    {
        return view('livewire.helpers.dashboard-navigation');
    }
}
