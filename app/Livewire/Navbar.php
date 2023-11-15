<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $search = '';
    public $usersearch = [];
    public function render()
    {
        $user = Auth::user();
        $usersearch = $this->usersearch;
        return view('livewire.navbar', compact('user','usersearch'));
    }

    public function autocomplete()
    {
        if ($this->search != null and strlen($this->search) >= 2) {
            $this->usersearch = User::where('username', 'like', '%' . $this->search . '%')->get();
        } else {
            $this->usersearch = [];
        }
    }
}
