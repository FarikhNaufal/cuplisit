<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jockey+One&family=Jost:wght@100;800&family=Montserrat&display=swap');
    </style>
</head>

<body class="bg-bodyBG flex lg:px-0 px-20 overflow-hidden h-screen justify-center items-center"
    style="font-family: 'Jockey One', sans-serif">
    @yield('content')
</body>
<script>
    const passwordToggle = document.querySelector('.js-password-toggle')

    passwordToggle.addEventListener('change', function() {
        const password = document.querySelector('.js-password'),
            passwordLabel = document.querySelector('.js-password-label')

        if (password.type === 'password') {
            password.type = 'text'
            passwordLabel.innerHTML = 'hide'
        } else {
            password.type = 'password'
            passwordLabel.innerHTML = 'show'
        }

        password.focus()
    })
</script>

</html>
