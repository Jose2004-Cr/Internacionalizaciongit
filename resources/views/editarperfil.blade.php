<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hidden { display: none; }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const photoInput = document.getElementById('photo');
            const photoPreviewContainer = document.getElementById('photo-preview-container');
            const currentPhotoContainer = document.getElementById('current-photo-container');
            const photoPreview = document.getElementById('photo-preview');
            const deletePhotoButton = document.getElementById('delete-photo-button');
            const verificationLinkSent = document.getElementById('verification-link-sent');

            photoInput.addEventListener('change', function () {
                const file = photoInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        photoPreview.src = e.target.result;
                        photoPreviewContainer.classList.remove('hidden');
                        currentPhotoContainer.classList.add('hidden');
                    };
                    reader.onerror = function () {
                        alert('Failed to read file. Please try again.');
                    };
                    reader.readAsDataURL(file);
                }
            });

            deletePhotoButton.addEventListener('click', function () {
                currentPhotoContainer.classList.add('hidden');
                photoPreviewContainer.classList.add('hidden');
                photoInput.value = '';
            });

            window.sendEmailVerification = function () {
                // Logic to send email verification
                verificationLinkSent.classList.remove('hidden');
            };
        });
    </script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <section class="container p-6 mx-auto bg-white rounded-md shadow-md">
        <h2 class="mb-4 text-2xl font-semibold">Profile Information</h2>
        <p class="mb-6">Update your account's profile information and email address.</p>

        <form action="{{ route('editarperfil') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Profile Photo -->
            <div class="mb-6">
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" id="photo" name="photo" class="hidden">

                <!-- Current Profile Photo -->
                <div id="current-photo-container" class="mt-2">
                    <img id="current-photo" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="object-cover w-20 h-20 rounded-full">
                </div>

                <!-- New Profile Photo Preview -->
                <div id="photo-preview-container" class="hidden mt-2">
                    <img id="photo-preview" class="object-cover w-20 h-20 rounded-full">
                </div>

                <button type="button" class="px-4 py-1 mt-2 text-white bg-blue-500 rounded hover:bg-blue-700" onclick="document.getElementById('photo').click();">Select A New Photo</button>
                <button type="button" id="delete-photo-button" class="px-4 py-1 mt-2 text-white bg-red-500 rounded hover:bg-red-700">Remove Photo</button>
            </div>

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" type="text" name="name" value="{{ $user->name }}" required autocomplete="name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $user->hasVerifiedEmail())
                    <p class="mt-2 text-sm text-red-600">Your email address is unverified.</p>
                    <button type="button" class="px-4 py-1 mt-2 text-white bg-yellow-500 rounded hover:bg-yellow-700" onclick="sendEmailVerification()">Click here to re-send the verification email.</button>
                @endif
            </div>

            <div class="mb-6">
                <p id="verification-link-sent" class="hidden text-sm text-green-600">A new verification link has been sent to your email address.</p>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </section>
</body>
</html>
