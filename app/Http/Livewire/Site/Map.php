<?php

namespace App\Http\Livewire\Site;

use App\Models\User;
use Livewire\Component;

class Map extends Component
{
    public $agencies;
    public $branches;
    public $selectedAgency;

    public function getBranches()
    {
        
    }

    public function render()
    {
        $this->agencies = User::where('user_type', 'agency')->get();
        return view('livewire.site.map');
    }
}
