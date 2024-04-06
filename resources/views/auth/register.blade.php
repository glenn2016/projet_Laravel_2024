<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <br>

        <!-- Firstame -->
        <div>
            <x-input-label for="irstname" :value="__('Firstname')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>
        <br>

         <!-- photodeprofil -->

        <div class="form-group">
            <x-input-label for="image" :value="__('Photo Profil')" />
                <input class="form-control" type="file" id="photoprophile" accept=".png, .jpeg, .jpg" :value="old('photoprophile')" name="photoprophile" required  autocomplete="photoprophile">
            <x-input-error :messages="$errors->get('photoprophile')" class="mt-2" />
        </div>
        <br>

        <!-- role -->
         <div>
            <x-input-label for="name" :value="__('Profil')" />
            <br>
            <input class="form-check-input" type="radio" name="role" id="role1" value="3">
            <label class="form-check-label" for="role" style="color:white;">Etudian</label>&nbsp;&nbsp;

            <input class="form-check-input" type="radio" name="role" id="role2" value="2">
            <label class="form-check-label-" for="role" style="color:white;">Enseignant</label>
        </div>

        

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
