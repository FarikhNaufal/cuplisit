<div class="flex flex-wrap gap-2 lg:gap-12 my-auto">
    <div class="flex-col">
        <h1 class="text-sm line-clamp-1 lg:text-xl">{{ $user->name }}</h1>
        <p class="text-sm lg:text-xl">{{ '@' }}{{ $user->username }}</p>
        <small class="font-sans text-neutral-600 text-sm">{{ $user->bio ?? 'Tidak ada bio' }}</small>
        <div class="flex text-sm lg:text-lg gap-2 text-neutral-600">
            <p>{{$following->count()}} Following</p>
            <p>{{$followers->count()}} Followers</p>
        </div>
    </div>
    @if (Auth::user() === $user)
        <a href="{{ route('users.edit', $user->username) }}"
            class="rounded-md py-1 px-2 lg:px-4 h-fit bg-transparent border-2 border-primary text-primary hover:bg-opacity-75 text-xs lg:text-base">Edit
            Profile</a>
    @else
        <div class="flex items-start gap-2 lg:text-base text-[10px]">
            <button wire:click="followButton" class="rounded-md py-1 px-4 {{$userHasFollowed ? 'bg-secondry' : 'bg-primary'}} hover:bg-opacity-75 text-white">{{ $userHasFollowed ? 'Unfollow' : 'Follow' }}</button>
        </div>
    @endif
</div>
