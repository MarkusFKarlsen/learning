<x-app-layout>
<div class="px-4 sm:px-0">
        Welcome to the image section, here you can view AI images submitted by other users, or add new images yourself.
    </div> 
    @auth
    <x-primary-button>
        <a href="{{ url('/add_image') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Add a new image
        </a>
    </x-primary-button>
        
    @else
    <x-primary-button>
        <a href="{{ route('login') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Log in to add a new image 
        </a>
    </x-primary-button>
        
    @endauth
    <table>
        <thead>
            <tr>
                <th>Caption</th>
                <th>Image</th>
                <th>Generated by</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image->prompt }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->prompt }}"  width="500" height="500">
                    </td>
                    <td>{{$image->user->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    
</x-app-layout>
