<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-head/>
    {{$slot}}
</body>
<script defer>
        function cancle(route = '/') {
            window.location.href = `{{url('${route}')}}`
        }

        function edit(e, route) {
            window.location.href = `{{url('${route}/${e.target.id}')}}`
        }

        function update(e, route) {
            window.location.href = `{{url('${route}/${e.target.id}/edit')}}`
        }

</script>
</html>