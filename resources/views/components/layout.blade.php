<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(["resources/css/app.css","resources/js/app.js"])
</head>

<body class="bg-black text-white h-full">
    <div class="flex h-full">
        <x-navbar></x-navbar>
        <main class="flex-1 ml-56 p-4">
            {{$slot}}
        </main>
    </div>
</body>

</html>