<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Change</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-blue-300">
    <div class="container w-1/2 mx-auto mt-52 flex flex-col items-center bg-gray-100 py-10  rounded-lg">
    <div>
        <h1 class="font-semibold text-lg">Reset Your Password From here:</h1>
        <div class="w-[35vw]">
        <x-passchange :hidden="true" link="{{url()->current()}}"/>
        </div>
    </div>
    </div>
</body>
</html>