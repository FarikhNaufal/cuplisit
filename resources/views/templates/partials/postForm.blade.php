<form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST" class="mb-4">
    @csrf
    <textarea id="caption" cols="30" rows="6" class="w-full border-primary border-2 rounded-lg p-6"
        placeholder="Write your text" name="caption"></textarea>
    @error('caption')
        <label class="text-red-600">{{ $message }}</label>
    @enderror
    <div class="flex grid-cols-2 mt-3 justify-between">
        <input type="file" name="media" id="" class="my-auto" accept="image/*" accept="video/*"
            class="file:bg-primary">
        @error('media')
            <label class="text-red-600">{{ $message }}</label>
        @enderror
        @error('error')
            <label class="text-red-600">{{ $message }}</label>
        @enderror
        <button type="submit"
            class="px-7 py-2 bg-primary rounded-lg w-fit text-white hover:bg-opacity-80">Post</button>
    </div>
</form>
