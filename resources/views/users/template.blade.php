<div class="w-full h-auto p-9 bg-white rounded-lg flex flex-col">
    <p class="lg:text-2xl text-xl mb-7">Settings</p>
    <div class="flex flex-col gap-2" x-data="{ isOpen: false }">
        <button @click="isOpen = true" class="w-fit text-lg hover:text-primary">Change Password</button>
        <form action="{{ route('logout') }}" enctype="multipart/form-data" method="post">
            @csrf
            <button class="block text-lg account-link hover:text-primary">Logout</button>
        </form>

        <div x-cloak x-show="isOpen"
            class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-60"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-100">
            <div class="bg-white p-8 rounded-lg lg:w-1/3 mx-4" x-transition:enter="transition ease-out duration-300">
                @livewire('change-password', ['user' => $user])
            </div>
        </div>
    </div>
</div>
