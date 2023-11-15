<header class="w-full items-center bg-white py-2 px-2 hidden sm:flex">
    {{-- <div class="w-1/2"></div> --}}
    <div x-data="{ isOpen: false }" class="relative flex justify-start lg:hidden">
        <button @click="isOpen = !isOpen" class="relative z-10 scale-50 overflow-hidden my-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none">
                <path d="M7.75 15.5H54.25V20.6667H7.75V15.5ZM7.75 28.4167H54.25V33.5833H7.75V28.4167ZM7.75 41.3333H54.25V46.5H7.75V41.3333Z" fill="black"/>
              </svg>
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed cursor-default"></button>
        <div x-show="isOpen" class="absolute bg-white mt-20 w-auto border shadow-md rounded-md">
            <div class="mx-3 my-4">
                <div class="flex justify-center">
                    <h1 class="text-xl text-secondry">CUPLIST<span class="text-primary">.IT</span></h1>
                </div>
                <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                    <a href="/" class="text-lg ">Following</a>
                </div>
                <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                    <a href="" class="text-lg ">Explore</a>
                </div>
                <div class="w-full hover:bg-primary rounded-md hover:text-white p-2">
                    <a href="/setting" class="text-lg ">Setting</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mr-3 lg:hidden" x-data="{ isOpen: false }">
        <button @click="isOpen = true"
            class="bg-primary w-full hover:bg-opacity-80 rounded-lg px-4 py-1 text-white">
            <h1 class="text-xl">+Post</h1>
        </button>
        <div x-show="isOpen" class="">
            <div x-show="isOpen"
                class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-50"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-100">
                <div class="bg-white p-6 rounded-lg" x-transition:enter="transition ease-out duration-300">
                    <h2 class="text-2xl font-semibold mb-4">Uploud Post</h2>
                    <form action="">
                        <textarea name="" id="post" cols="30" rows="6"
                            class="w-full border-primary border-2 rounded-lg p-6 resize-none" placeholder="Write your text" required></textarea>
                        <div class="flex flex-col gap-2 mt-3 justify-between">
                            <div class="flex">
                                <input type="file" name="" id="" class="my-auto"
                                    accept="file_extension|video/*|image/*" class="file:bg-primary">
                            </div>
                            <button type="submit"
                                class="px-7 py-2 bg-primary rounded-lg w-1/2 text-white hover:bg-opacity-80">post</button>
                        </div>
                    </form>
                    <div class="mt-4">
                        <button @click="isOpen = false"
                            class="bg-red-500 hover:bg-red-700 text-white font-light py-2 px-4 rounded">
                            Tutup Modal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" class="border-2 border-primary rounded-xl px-2 py-1 w-full" placeholder="Search">
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-primary hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="/images/faiz.jpg">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-auto bg-white rounded-lg shadow-lg py-4 px-3 mt-16">
            <p class="text-gray-700 ">Faiz Alil</p>
            <p class="text-gray-700 ">faizalil@gmail.com</p>
            <div class="bg-gray-700 w-full h-[1px] my-2"></div>
            <a href="setting" class="block  account-link hover:text-primary">Edit Profile</a>
            <a href="login" class="block  account-link hover:text-primary">Logout</a>
        </div>
    </div>
    
</header>