<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $user;
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'oldPassword' => 'required',
        'newPassword' => 'required|min:8|regex:/^(?=.*[0-9])/',
        'confirmPassword' => ['required', 'same:newPassword'],
    ];

    public function render()
    {
        $user = $this->user;
        return view('livewire.change-password', compact('user'));
    }

    public function updatePassword(){
        $this->validate();


        if (Hash::check($this->oldPassword, $this->user->password)) {
            $this->user->update([
                'password' => bcrypt($this->newPassword),
            ]);
            return redirect()->route('users.edit', $this->user->username)->with('success', 'Password succesfully updated.');
            $this->reset('oldPassword', 'newPassword', 'confirmPassword');
        } else {
            $this->addError('oldPassword', 'Old password doesnt match.');
        }


    }
}
