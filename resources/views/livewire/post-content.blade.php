<div>
    <div x-data="{ showComments: false }">
        <div class="flex flex-wrap gap-2">
            <div>
                <button wire:click="likeButton" class="bg-blue-500 rounded-lg text-white px-4 py-2">
                    @if ($userHasLiked)
                        Liked {{$likes}}

                    @else
                        Like {{$likes}}
                    @endif
                </button>
            </div>
            <div>
                <button wire:click="dislikeButton" class="bg-red-500 rounded-lg text-white px-4 py-2">
                    @if ($userHasDisliked)
                        Disliked {{$dislikes}}

                    @else
                        Dislike {{$dislikes}}
                    @endif
                </button>
            </div>
            <button @click="showComments = !showComments"
                class="bg-green-500 rounded-lg text-white px-4 py-2 flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36 32"
                    fill="none">
                    <path
                        d="M18 0C8.1 0 0 6.36444 0 14.2222C0.09 18.0444 1.908 21.6356 4.95 24C4.95 25.0667 4.194 27.8578 0 32C4.266 31.8044 8.352 30.2222 11.646 27.5556C13.698 28.1422 15.858 28.4444 18 28.4444C27.9 28.4444 36 22.08 36 14.2222C36 6.36444 27.9 0 18 0ZM18 24.8889C10.044 24.8889 3.6 20.1067 3.6 14.2222C3.6 8.33778 10.044 3.55556 18 3.55556C25.956 3.55556 32.4 8.33778 32.4 14.2222C32.4 20.1067 25.956 24.8889 18 24.8889Z"
                        fill="white" />
                </svg>

                {{ $comments->count() }}

            </button>
            <div class="w-full">
                <div x-cloak x-show="showComments" class="mt-4">
                    <ul>
                        @foreach ($comments as $comment)
                            <li class="flex gap-2 mb-2">
                                <img src="images/faiz.jpg" alt="profile"
                                    class="w-8 h-8 rounded-full border-primary border-2">
                                <div class="flex flex-col">
                                    <div class="flex gap-2">
                                        <p>
                                            {{ $comment->user->username }}
                                        </p>

                                        <p class="text-neutral-500 text-sm">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <p class="">
                                        <span class="font-sans font-normal">{{ $comment->content }}</span>
                                    </p>
                                </div>

                            </li>
                        @endforeach

                        <li class="flex gap-2 mb-2">
                            <img src="images/faiz.jpg" alt="profile"
                                class="w-8 h-8 rounded-full border-primary border-2">
                            <form wire:submit.prevent="storeComment" class="flex w-full gap-2">
                                @csrf
                                {{-- <input type="hidden" wire:model="post_id" value="{{ $post->id }}"> --}}
                                <input type="text" wire:model="content" id=""
                                    class="w-full border-primary border-2 rounded-lg p-2"
                                    placeholder="Write your coment">
                                <button type="submit" class="bg-primary px-4 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 100 100" fill="none">
                                        <path
                                            d="M49.9999 0.833252C56.4566 0.833252 62.85 2.10499 68.8152 4.57584C74.7804 7.0467 80.2005 10.6683 84.766 15.2338C89.3316 19.7994 92.9531 25.2195 95.424 31.1847C97.8949 37.1498 99.1666 43.5433 99.1666 49.9999C99.1666 63.0397 93.9865 75.5455 84.766 84.766C75.5455 93.9865 63.0397 99.1666 49.9999 99.1666C43.5433 99.1666 37.1498 97.8949 31.1847 95.424C25.2195 92.9531 19.7994 89.3316 15.2338 84.766C6.0133 75.5455 0.833252 63.0397 0.833252 49.9999C0.833252 36.9601 6.0133 24.4544 15.2338 15.2338C24.4544 6.0133 36.9601 0.833252 49.9999 0.833252ZM30.3333 28.9074V45.3291L65.4383 49.9999L30.3333 54.6708V71.0924L79.4999 49.9999L30.3333 28.9074Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

