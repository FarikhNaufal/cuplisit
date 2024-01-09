@extends('admin.templates.adminTemplates')

@section('content')
    <div>
        <div class="max-w-full overflow-x-auto bg-white p-8 rounded shadow">

            <h1 class="text-2xl mb-6">Report Post</h1>
    
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="py-2 px-4 border-b">Post ID</th>
                        <th class="py-2 px-4 border-b">User ID</th>
                        <th class="py-2 px-4 border-b">Post Type</th>
                        <th class="py-2 px-4 border-b">Content</th>
                        <th class="py-2 px-4 border-b">Image</th>
                        <th class="py-2 px-4 border-b">Video</th>
                        <th class="py-2 px-4 border-b">Report Count</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example row with image and video -->
                    <tr>
                        <td class="py-2 px-4 border-b">1</td>
                        <td class="py-2 px-4 border-b">123</td>
                        <td class="py-2 px-4 border-b">Image</td>
                        <td class="py-2 px-4 border-b">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec justo eu elit pharetra scelerisque ac eu massa.</td>
                        <td class="py-2 px-4 border-b"><img src="image-url.jpg" alt="Image" class="max-w-full h-auto"></td>
                        <td class="py-2 px-4 border-b">-</td>
                        <td class="py-2 px-4 border-b">3</td>
                        <td class="py-2 px-4 border-b">
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <!-- Example row with video -->
                    <tr>
                        <td class="py-2 px-4 border-b">2</td>
                        <td class="py-2 px-4 border-b">456</td>
                        <td class="py-2 px-4 border-b">Video</td>
                        <td class="py-2 px-4 border-b">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</td>
                        <td class="py-2 px-4 border-b">-</td>
                        <td class="py-2 px-4 border-b">
                            <iframe width="100" height="60" src="https://www.youtube.com/embed/6CXwQtNrJkk?si=weSc5Dtsw9ccqhan" frameborder="0" allowfullscreen></iframe>
                            
                        </td>
                        <td class="py-2 px-4 border-b">2</td>
                        <td class="py-2 px-4 border-b">
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
    
        </div>
    
    </div>
@endsection