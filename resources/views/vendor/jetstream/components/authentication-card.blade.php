<style>
        .gradient {
            background: linear-gradient(120deg, #36006c 8%, #ddbbff 100%);
        }
</style>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 gradient">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
