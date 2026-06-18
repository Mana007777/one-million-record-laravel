<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Million Records</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-950 via-gray-900 to-gray-800">

        <div class="w-full max-w-lg backdrop-blur-xl bg-white/5 border border-white/10 rounded-3xl p-8 shadow-2xl">

            <h1 class="text-3xl font-bold text-white text-center">
                Upload Dataset
            </h1>

            <p class="text-gray-400 text-center mt-2 mb-8">
                Import CSV or Excel files for processing
            </p>

            <form action="/upload" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <label
                    class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-600 rounded-2xl cursor-pointer hover:border-blue-500 transition">

                    <svg class="w-12 h-12 text-gray-500 mb-3"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>

                    <span class="text-gray-300">
                        Click to upload
                    </span>

                    <span class="text-gray-500 text-sm mt-1">
                        CSV, XLSX
                    </span>

                    <input type="file" name="file" class="hidden">
                </label>

                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl bg-blue-600 hover:bg-blue-500 text-white font-semibold transition">
                    Upload Dataset
                </button>
            </form>

        </div>

    </div>
</body>

</html>