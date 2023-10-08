<x-app-layout>
    <h1>Upload an Image</h1>
    @if(session('success'))
    <x-modal>
        <x-slot:name>
            Succesfull image generation modal
        </x-slot>
        <x-slot:show>
            true
        </x-slot>
        <p>You have Successfully added a new image, would you like to add more, or return to the images section?</p>
        <x-primary-button>
            <a href="{{route('image.create')}}">
                Continue Editing
            </a>
        </x-primary-button>
        
        <x-secondary-button>
            <a href="{{ route('images') }}">
                Go to Images
            </a>
        </x-secondary-button>
        
    </x-modal>
    @endif
    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="prompt">Prompt:</label>
            <input type="text" id="prompt" name="prompt" required>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit">Upload</button>
    </form>
</x-app-layout>