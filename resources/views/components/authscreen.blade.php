<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        form input {
            background-color: #fcfcfc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                        bgDefault: "#0e0101",
                        cardBg: "rgb(153, 131, 131)"
                    },
                    spacing: {
                        '92': '22rem',
                    }
                },
            },
        };
    </script>
    <title>LaraMeals</title>
</head>

<body class="bg-bgDefault relative">
    <main class="w-full md:flex">
        <div class="md:h-screen bg-[url('/img/auth-bg.jpg')] basis-1/2 bg-cover bg-center bg-no-repeat ">

        </div>

        {{ $slot }}

    </main>

    <x-flash-message />
</body>

</html>
