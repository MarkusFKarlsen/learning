<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <h1>User-Generated Images</h1>
    <table>
        <thead>
            <tr>
                <th>Caption</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_images as $image)
                <tr>
                    <td>{{ $image->prompt }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->prompt }}"  width="500" height="600">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
