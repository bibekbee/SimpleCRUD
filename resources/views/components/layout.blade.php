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
        function cancle() {
            window.location.href = `{{url('/')}}`
        }

        function edit(e) {
            window.location.href = `{{url('show/${e.target.id}')}}`
        }

        function update(e) {
            window.location.href = `{{url('show/${e.target.id}/edit')}}`
        }

</script>
</html>