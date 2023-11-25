@extends('templates.client')

@section('content')
    <div class="w-full h-[90vh] p-7 md:p-9 bg-white rounded-lg overflow-scroll border-t flex flex-col">
        <div class="flex flex-wrap lg:justify-stretch justify-between lg:gap-9">
            <img src="images/admin.png" alt="profile" class="rounded-full lg:w-40 lg:h-40 w-14 h-14">
            <div class="my-auto">
                <h1 class="text-sm lg:text-xl">Admin Cuplisit</h1>
                <p class="text-sm lg:text-xl">@admincuplisit</p>
                <p class="font-sans lg:text-xl text-sm">Halo semua saya admin</p>
                <p class="font-sans lg:text-xl text-sm">JL. Tidak Ditemukan</p>
                <div class="grid text-sm lg:text-lg grid-cols-2">
                    <p>10 Following</p>
                    <p>100k Followers</p>
                </div>
            </div>
            <div class="flex self-start gap-2 lg:text-base text-[10px]">
                <button class="rounded-md py-1 px-4 bg-primary hover:bg-opacity-75 text-white">Follow</button>
                <button class="rounded-md py-1 px-4 bg-secondry hover:bg-opacity-75 text-white">Unfollow</button>
            </div>
        </div>
        
        <div x-data="{ activeTab: 1 }">
            <div class="lg:my-6">
                <div class="bg-gray-700 w-full h-[1px] mt-8 mb-3"></div>
                <div class="grid grid-cols-2 justify-items-center">
                    <button @click="activeTab = 1" :class="{ ' border-b-4 border-black': activeTab === 1 }" class="w-1/2">Post</button>
                    <button @click="activeTab = 2" :class="{ 'border-b-4 border-black': activeTab === 2 }" class="w-1/2">Liked</button>
                </div>
                <div class="bg-gray-700 w-full h-[1px] mt-4"></div>
            </div>
            {{-- Postingan --}}
            <div x-show="activeTab === 1" x-cloak>
                <div class="flex justify-between mt-9">
                    <div class="flex">
                        <img src="images/admin.png" alt="profile" class="w-12 h-12 rounded-full border-primary border-2">
                        <div class="flex-col  ml-4">
                            <p class="my-auto text-xl">Admincuplisit</p>
                            <p class="mb-3 text-sm text-neutral-500">1 hours ago</p>
                        </div>
                    </div>
                    <div class="mt-auto my-auto" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="10" viewBox="0 0 40 10"
                                fill="none">
                                <path
                                    d="M30 5C30 3.67392 30.5268 2.40215 31.4645 1.46447C32.4021 0.526785 33.6739 0 35 0C36.3261 0 37.5979 0.526785 38.5355 1.46447C39.4732 2.40215 40 3.67392 40 5C40 6.32608 39.4732 7.59785 38.5355 8.53553C37.5979 9.47322 36.3261 10 35 10C33.6739 10 32.4021 9.47322 31.4645 8.53553C30.5268 7.59785 30 6.32608 30 5ZM15 5C15 3.67392 15.5268 2.40215 16.4645 1.46447C17.4021 0.526785 18.6739 0 20 0C21.3261 0 22.5979 0.526785 23.5355 1.46447C24.4732 2.40215 25 3.67392 25 5C25 6.32608 24.4732 7.59785 23.5355 8.53553C22.5979 9.47322 21.3261 10 20 10C18.6739 10 17.4021 9.47322 16.4645 8.53553C15.5268 7.59785 15 6.32608 15 5ZM0 5C0 3.67392 0.526784 2.40215 1.46447 1.46447C2.40215 0.526785 3.67392 0 5 0C6.32608 0 7.59785 0.526785 8.53553 1.46447C9.47322 2.40215 10 3.67392 10 5C10 6.32608 9.47322 7.59785 8.53553 8.53553C7.59785 9.47322 6.32608 10 5 10C3.67392 10 2.40215 9.47322 1.46447 8.53553C0.526784 7.59785 0 6.32608 0 5Z"
                                    fill="black" />
                            </svg>
                        </button>
                        <div x-cloak x-show="isOpen"
                            class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-50"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-100">
                            <div class="bg-white p-8 rounded-lg lg:w-1/2 w-2/3"
                                x-transition:enter="transition ease-out duration-300">
                                <h2 class="text-2xl font-semibold mb-4">Setting Postingan</h2>
                                <div class="flex gap-4">
                                    <a href=""
                                        class="bg-red-500 hover:bg-red-700 text-white font-light py-2 px-4 rounded">Report
                                        this post</a>
                                    <button @click="isOpen = false"
                                        class="bg-primary hover:bg-opacity-75 text-white font-light py-2 px-4 rounded">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 mb-1">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, eveniet necessitatibus eligendi dolores quidem omnis error laborum veritatis eum ea consequuntur ad illo amet atque id unde accusantium! A, dolor eveniet ipsam atque inventore, mollitia necessitatibus suscipit provident id nostrum totam iure minus sequi autem reiciendis voluptatibus officia amet? Soluta.</p>
        
                </div>
                <img src="images/post.png"
                    class="rounded-xl aspect-square object-cover lg:w-1/2 transition" alt="post">
            </div>
            {{-- Liked --}}
            <div x-show="activeTab === 2" x-cloak>
                <div class="mt-9">
                    <div class="flex">
                        <img src="images/admin.png" alt="profile" class="w-12 h-12 rounded-full border-primary border-2">
                        <div class="flex-col  ml-4">
                            <p class="my-auto text-sm">Admincuplisit</p>
                            <p class="text-sm text-neutral-500">1 hours ago</p>
                            <p class="text-sm">Liked to postingan alilfaiz</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection