@extends('admin.templates.adminTemplates')

@section('content')
<div class=" mx-auto bg-white p-8 rounded shadow">

    <h1 class="text-2xl mb-6">Report User Admin</h1>

    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-primary text-white">
            <tr>
                <th class="py-2 px-4 border-b">User ID</th>
                <th class="py-2 px-4 border-b">Username</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Report Count</th>
                <th class="py-2 px-4 border-b">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4 border-b">1</td>
                <td class="py-2 px-4 border-b">Farikh</td>
                <td class="py-2 px-4 border-b">mfarikh@gmail.com</td>
                <td class="py-2 px-4 border-b">2</td>
                <td class="py-2 px-4 border-b">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                        Hapus
                    </button>
                </td>
            </tr>
            <tr>
                <td class="py-2 px-4 border-b">2</td>
                <td class="py-2 px-4 border-b">Faiz</td>
                <td class="py-2 px-4 border-b">faizalil@gmail.com</td>
                <td class="py-2 px-4 border-b">5</td>
                <td class="py-2 px-4 border-b">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                        Hapus
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    

</div>
@endsection