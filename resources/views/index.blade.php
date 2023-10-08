@auth 
<x-app-layout>
    Hello {{Auth::User() -> name}}
</x-app-layout>
@endauth

@guest 
<x-guest-layout>
        <h2 class="text-xl font-medium text-gray-900">
            Hello Guest user, welcome to this basic Laravel website
        </h2>
        <br>
        <p>
            This is made as a basic test for learning the framework, as well as experiment with various packages and applications.
        </p>
</x-guest-layout>
@endguest