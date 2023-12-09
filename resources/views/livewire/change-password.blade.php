<div>
    <p class="lg:text-xl text-lg">Change Password</p>
    {{-- <div class="bg-green-300 px-2 rounded-md my-5 py-1">
        <p class="text-green-700">Succesfly change password</p>
    </div> --}}
    <div class="flex gap-4 items-center my-6">
        <img src="{{ $user->avatar ? asset('users/' . $user->id . '/' . $user->avatar) : asset('images/user.jpg') }}"
            alt="" class="border-2 border-primary w-14 rounded-full aspect-square object-cover">

        <div class="flex flex-col">
            <p class="text-lg">{{ $user->username }}</p>
        </div>
    </div>
    <form wire:submit="updatePassword" class="flex flex-col gap-4">
        <div class="flex-col gap-2">
            <label for="username" class="text-base my-auto">Old Password</label>
            <input type="text" wire:model="oldPassword" class="w-full p-2 border-2 border-primary rounded-lg">
            @error('oldPassword')
                <label class="text-red-600">{{ $message }}</label>
            @enderror
        </div>
        <div class="flex-col gap-2">
            <label for="name" class="text-base mr-5 my-auto">New Password</label>
            <input type="text" wire:model="newPassword" class="w-full p-2 border-2 border-primary rounded-lg">
            @error('newPassword')
                <label class="text-red-600">{{ $message }}</label>
            @enderror
        </div>
        <div class="flex-col gap-2">
            <label for="name" class="text-base my-auto">Confirm Password</label>
            <input type="text" wire:model="confirmPassword" class="w-full p-2 border-2 border-primary rounded-lg">
            @error('confirmPassword')
                <label class="text-red-600">{{ $message }}</label>
            @enderror
        </div>
        <div class="flex gap-2  mt-2">
            <button type="submit" class="bg-green-700 rounded-md px-5 w-fit py-2 text-white">Change
                Password</button>
            <button @click="isOpen = false" type="button"
                class="bg-red-500 hover:bg-red-700 text-white w-fit font-light py-2 px-4 rounded">
                Close
            </button>
        </div>
    </form>
</div>
