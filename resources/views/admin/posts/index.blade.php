@extends('admin.templates.adminTemplates')

@section('content')
    <div>
        <div class="max-w-full overflow-x-auto bg-white p-8 rounded shadow">

            <h1 class="text-2xl mb-6">Report Post</h1>

            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-primary text-white">
                    <tr class="text-left">
                        <th class="py-2 px-4 border-b">Post ID</th>
                        <th class="py-2 px-4 border-b">username</th>
                        <th class="py-2 px-4 border-b">Content</th>
                        <th class="py-2 px-4 border-b">Media</th>
                        <th class="py-2 px-4 border-b">Report Count</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $report->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $report->user->username }}</td>
                            <td class="py-2 px-4 border-b w-80">{{ $report->caption ?? '-' }}</td>
                            <td class="py-2 px-4 border-b">
                                <div class="" x-data="{ isOpen: false }">
                                    @if ($report->media)
                                        <button @click="isOpen = !isOpen"
                                            class="bg-transparent border-2 border-primary rounded-md px-2 py-1 text-primary">

                                            Details
                                        </button>
                                    @else
                                        -
                                    @endif

                                    <div x-cloak x-show="isOpen"
                                        class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-800 bg-opacity-50"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 scale-100">
                                        <div class="bg-white p-8 rounded-lg w-96 h-96 flex flex-col gap-2"
                                            x-transition:enter="transition ease-out duration-300">
                                            @php
                                                $videoExtensions = ['mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'webm'];
                                                $extension = pathinfo($report->media, PATHINFO_EXTENSION);
                                            @endphp

                                            @if (in_array($extension, $videoExtensions))
                                                <video controls class="rounded-xl object-cover w-82  transition">
                                                    <source
                                                        src="{{ asset('users/' . $report->user->id . '/posts/' . $report->media) }}"
                                                        type="video/{{ $extension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <img src="{{ asset('users/' . $report->user->id . '/posts/' . $report->media) }}"
                                                    onclick=""
                                                    class="rounded-xl aspect-square object-cover w-72 transition"
                                                    alt="post">
                                            @endif


                                            <button @click="isOpen = false"
                                                class="bg-primary hover:bg-opacity-75 text-white font-light py-2 px-4 rounded mb-0 mt-auto w-fit">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </td>
                            <td class="py-2 px-4 border-b">{{ $report->report_count }}</td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('deletePost', ['userID' => $report->user->id, 'post' => $report]) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
@endsection
