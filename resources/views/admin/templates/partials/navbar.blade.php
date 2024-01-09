<div class="">
    <header class="w-full items-center bg-white p-2 md:px-10 flex">
        <div x-data="{ isOpen: false }" class="relative flex justify-start lg:hidden">
            <button @click="isOpen = !isOpen" class="relative z-10 scale-50 overflow-hidden my-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none">
                    <path
                        d="M7.75 15.5H54.25V20.6667H7.75V15.5ZM7.75 28.4167H54.25V33.5833H7.75V28.4167ZM7.75 41.3333H54.25V46.5H7.75V41.3333Z"
                        fill="black" />
                </svg>
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed cursor-default"></button>
            <div x-cloak x-show="isOpen" class="absolute bg-white mt-20 w-auto border shadow-md rounded-md">
                <div class="mx-3 my-4">
                    <div class="flex justify-center">
                        <h1 class="text-xl text-secondry">ADMIN<span class="text-primary">.IT</span></h1>
                    </div>
                    <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                        <a href="/admin/report" class="text-lg ">ReportPostingan</a>
                    </div>
                    <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                        <a href="/admin/" class="text-lg ">ReportUser</a>
                    </div>
                </div>
            </div>
        </div>
        

        <div x-data="{ isOpen: false }" class="me-0 ms-auto">
            <button @click="isOpen = !isOpen"
                class="z-10 w-12 h-12 rounded-full object-cover aspect-square overflow-hidden border-4 border-primary hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img
                    src="{{ asset('images/user.jpg') }}">
            </button>
            {{-- <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button> --}}
            <div x-cloak x-show="isOpen"
                class="absolute w-auto right-3 bg-white rounded-lg shadow-lg py-4 px-3 mt-3 md:mt-5">
                
                <form action="/admin/login" enctype="multipart/form-data">
                    @csrf
                    <button class="block  account-link hover:text-primary">Logout</button>
                </form>
            </div>
        </div>


    </header>

</div>
