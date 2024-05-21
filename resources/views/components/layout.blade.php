<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        function confirmation(message){
            let formElement = document.getElementById('delete');
            let ans = confirm(message);

            if(ans == false){
                formElement.innerHTML = '';
                formElement.method = "get";
                formElement.action = "{{url('setting')}}";
                console.log("Cancle");
            }else{
                formElement.action = "{{url('setting')}}";
            }
        }

        function editUserName(){
        let formdiv = document.querySelector('#form');
        console.log(formdiv);
        let userName = document.querySelector('#userName');
        let form = document.createElement('form');
        form.action = window.location.href + '/edit';
        form.method = 'post';
        form.innerHTML = `@csrf
            <label class="font-blod mb-2" for="name">Name:</label>
            <input id="name" type="text" name="name" value="${userName.innerHTML.slice(5)}"/>
            <input class="mt-5 py-1 px-4 bg-blue-500 rounded-lg text-white" type="submit" value="submit"/>`;
        formdiv.classList.add('absolute','top-[30%]','lg:left-[40%]','rounded-lg','p-5','lg:p-20','bg-gray-100');
        form.classList.add('flex', 'flex-col');
        formdiv.appendChild(form);
        }
</script>
</html>