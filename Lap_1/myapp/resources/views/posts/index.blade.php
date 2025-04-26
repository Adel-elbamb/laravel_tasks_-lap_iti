<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Posts Page</title>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Post Info</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Body</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post['id'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post['title'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($post['body'], 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post['created_at'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <a href="/posts/{{$post['id']}}">view</a>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <a href="/posts/{{$post['id']}}/edit">edit</a>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <a href="/posts/{{$post['id']}}">update</a>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <a href="/posts/{{$post['id']}}">delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
