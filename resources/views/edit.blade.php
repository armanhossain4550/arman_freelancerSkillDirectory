<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Edit Post</title>
</head>
<body class="bg-gradient-to-br from-blue-900 via-blue-800 to-orange-100 min-h-screen">
  <div class="container mx-auto px-8 py-10">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-orange-400">Edit - {{ $post->name }}</h1>
      <a href="{{ route('home') }}" 
         class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded-lg shadow">
        Back to Home
      </a>
    </div>

    <div class="bg-white shadow-lg rounded-xl p-6">
      <form method="POST" action="{{ route('update', $post->id) }}" class="flex flex-col gap-5">
        @csrf
        @method('PUT')

        
        <label class="font-semibold">ID</label>
        <input type="text" name="id" value="{{ $post->id }}" readonly
               class="px-4 py-2 border rounded bg-gray-100 cursor-not-allowed">

        
        <label class="font-semibold">Name</label>
        <input type="text" name="name" value="{{ $post->name }}" 
               class="px-4 py-2 border rounded focus:ring-2 focus:ring-orange-400 outline-none">
        @error('name') <p class="text-red-600">{{ $message }}</p> @enderror

      
        <label class="font-semibold">Skill</label>
        <input type="text" name="skill" value="{{ $post->skill }}" 
               class="px-4 py-2 border rounded focus:ring-2 focus:ring-orange-400 outline-none">
        @error('skill') <p class="text-red-600">{{ $message }}</p> @enderror

      
        <label class="font-semibold">Location</label>
        <input type="text" name="location" value="{{ $post->location }}" 
               class="px-4 py-2 border rounded focus:ring-2 focus:ring-orange-400 outline-none">
        @error('location') <p class="text-red-600">{{ $message }}</p> @enderror

      
        <label class="font-semibold">Contact Info</label>
        <input type="text" name="contact_info" value="{{ $post->contact_info }}" 
               class="px-4 py-2 border rounded focus:ring-2 focus:ring-orange-400 outline-none">
        @error('contact_info') <p class="text-red-600">{{ $message }}</p> @enderror

      
        <button type="submit" 
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
          Update Post
        </button>
      </form>
    </div>
  </div>
</body>
</html>
