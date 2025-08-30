<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                }
            }
        }
    </script>

    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply max-w-6xl mx-auto px-6;
            }
        }
    </style>

    <title>Freelancer Posts</title>
</head>
<body class="bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 font-sans text-gray-800 min-h-screen">

    <div class="container py-12">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-indigo-700">Freelancer Posts</h1>
            <a href="/create" 
               class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded px-4 py-2 shadow-md transition">
               + Add New Post
            </a>
        </div>

      
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-800 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Skill</th>
                        <th class="px-6 py-4">Location</th>
                        <th class="px-6 py-4">Contact Info</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach ($posts as $post)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm font-medium">{{ $post->id }}</td>
                            <td class="px-6 py-4 text-sm">{{ $post->name }}</td>
                            <td class="px-6 py-4 text-sm">{{ $post->skill }}</td>
                            <td class="px-6 py-4 text-sm">{{ $post->location }}</td>
                            <td class="px-6 py-4 text-sm">{{ $post->contact_info }}</td>
                            <td class="px-6 py-4 text-sm text-right space-x-2">
                                <a href="{{ route('edit', $post->id) }}" 
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow text-sm font-medium transition">
                                   Edit
                                </a>

                                <form action="{{ route('delete', $post->id) }}" 
                                      method="POST" 
                                      class="inline-block" 
                                      onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow text-sm font-medium transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            
            <div class="p-4 bg-gray-50 border-t">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

</body>
</html>
