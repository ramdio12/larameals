<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/img/default.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }


        .midnav li {
            cursor: pointer;
            padding: 1.5rem 1.2rem;
        }

        .midnav li:hover {
            background-color: #fff;
            color: red;
        }

        .midnav li a {
            display: block;
            font-weight: 700;
        }

        .navhidden li {
            margin: 0.5rem 0;
            padding: 0.5rem 1rem;
        }

        .navhidden li:hover {
            color: red;
            cursor: pointer;
            background-color: #fff;
        }

        #closeNavBtn {
            display: none;
            animation: spinonce 1s;
        }

        .addform input,
        select {
            background-color: #f5f5f5;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2)
        }

        .addform textarea {
            resize: none;
            background-color: #d1cece;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .addform label {
            font-weight: bold;
        }



        .ingredients li {
            margin-bottom: 0.5rem;
            list-style-type: disc;
        }

        .ingredients li::marker {
            color: red;
            font-size: 1.5rem;
        }

        .ingredients li {
            font-weight: 600;
        }

        .ingredients ul li::marker {
            color: blue;
            font-size: 1rem;
        }

        .ingredients ul li {
            font-weight: 400;
        }

        .instructions li {
            margin-bottom: 0.6rem;
            list-style-type: decimal;
        }

        .instructions li::marker {
            color: blue;
            font-weight: 700;
            background-color: #fff;
        }

        .instructions ul li {
            margin-left: 2rem;
            margin-bottom: 0.5rem;
            list-style-type: disc;
        }


        @keyframes spinonce {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(180deg);
            }
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

<body class="bg-bgDefault">
    <header class="relative w-full flex justify-between items-center bg-gray-200 py-[1rem] md:py-0">
        <div>
            <a href="/" class="text-4xl font-bold ml-4 flex">
                <span class="text-red-700">Lara</span><span class="text-blue-700">Meal</span>
                <img class="w-10" src="/img/restaurant.png" alt="logo">
            </a>
        </div>
        @auth
            {{-- <nav class="hidden md:block">
                <ul class="flex gap-4 items-center justify-center">
                    <li><a href="/" class="font-semibold text-xl hover:text-red-500 duration-500 ease-in-out">HOME</a>
                    </li>
                    <li><a href="/recipes/manage"
                            class="font-semibold text-xl hover:text-red-500 duration-500 ease-in-out">MY RECIPES</a></li>
                </ul>
            </nav> --}}
            <nav class="hidden md:block ">
                <ul class="flex items-center justify-center midnav">
                    <li><a href="/">HOME</a></li>
                    <li><a href="/user/profile">PROFILE</a></li>
                    <li><a href="/recipes/manage">RECIPE</a></li>
                </ul>
            </nav>
            <nav class="relative hidden md:block">
                <ul class="flex gap-4 items-center justify-center">


                    <li>
                        <a href="/recipes/create"
                            class="text-white bg-red-400 p-2 rounded hover:bg-red-700 duration-500 ease-in-out"><i
                                class="fa-solid fa-plus"></i> Add Recipes</a>
                    </li>
                    <li class="pr-4">
                        <button id="userBtn" class="flex items-center justify-center gap-4">
                            <span class="font-bold">Hi {{ auth()->user()->name }}</span>
                            <div class="w-12">
                                <img class="w-full p-1 rounded-full"
                                    src={{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('/img/default.png') }}
                                    alt="profilepic">
                            </div>

                            {{-- <i class="fa-solid fa-caret-down" id="userBtnDown"></i>
                            <i class="fa-solid fa-caret-up hidden" id="userBtnUp"></i> --}}
                        </button>
                    </li>
                    <li class="absolute right-0 top-14 hidden z-10" id="settings">
                        <div class="bg-gray-200 w-60 flex flex-col justify-center rounded">
                            {{-- <a href="/user/profile" class="text-xl py-2 px-4  hover:bg-red-600 hover:text-white">
                                <i class="fa-solid fa-user mr-2"></i>
                                My Profile</a>
                            <a href="/recipes/manage" class="text-xl py-2 px-4 hover:bg-red-600 hover:text-white">
                                <i class="fa-solid fa-bowl-food mr-2"></i>
                                My Recipes
                            </a> --}}

                            <form action="/logout" method="POST">
                                @csrf

                                <button class="text-xl py-2 px-4 hover:bg-red-600 w-full text-left hover:text-white">
                                    <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                    Log Out</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <nav class=" md:hidden absolute right-0 left-0 top-16">
                <ul class="hidden bg-gray-200 mt-2 w-100 navhidden">
                    <li><a href="/">
                            <i class="fa-solid fa-home mr-2"></i>
                            Home</a></li>
                    <li><a href="/recipes/manage">
                            <i class="fa-solid fa-apple-whole mr-2"></i>
                            Recipes</a></li>
                    <li><a href="/user/profile">
                            <i class="fa-solid fa-user mr-2"></i>
                            My Profile</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf

                            <button>
                                <i class="fa-solid fa-right-from-bracket mr-2"></i>
                                Log Out</button>
                        </form>
                    </li>

                </ul>
            </nav>
            <a href="/recipes/create"
                class="md:hidden text-white bg-red-400 p-2 rounded hover:bg-red-700 duration-500 ease-in-out mr-20"><i
                    class="fa-solid fa-plus"></i> Add Recipes</a>
            <button class="md:hidden absolute right-8">
                <i class="fas fa-bars text-4xl " id="openNavBtn"></i>
                <i class="fa-solid fa-xmark text-4xl" id="closeNavBtn"></i>
            </button>
        @else
            {{-- <a href="/recipes/create"
                class="mr-8 text-white bg-red-400 p-2 rounded hover:bg-red-700 duration-500 ease-in-out"><i
                    class="fa-solid fa-plus"></i> Add Recipes</a> --}}
            <nav class="block mr-8 py-8">
                <ul class="flex gap-4 items-center justify-center">
                    {{-- <li>
                        <a href="/recipes/create"
                            class="hidden md:block text-white bg-red-400 p-2 rounded hover:bg-red-700 duration-500 ease-in-out"><i
                                class="fa-solid fa-plus"></i> Add Recipes</a>
                    </li> --}}
                    <li><a href="/login" class="font-bold">Login</a></li>
                    <li><a href="/register"
                            class="font-bold bg-blue-600 hover:bg-blue-800 duration-500 ease-in-out p-2 rounded text-white">Get
                            Started</a></li>
                </ul>
            </nav>


        @endauth

    </header>
    <main class="min-h-screen w-full">
        {{ $slot }}
    </main>

    <x-flash-message />

    <footer class="w-100  bg-neutral-700 px-4 py-6 text-center">
        <div>
            <p class="text-white">Thank you for testing</p>
            <p class="text-white">Copyright &copy;2024</p>
        </div>
    </footer>
</body>
<!-- <script src="index.js" defer></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>
    const closeNavBtn = document.getElementById('closeNavBtn');
    const openNavBtn = document.getElementById('openNavBtn');
    const navhidden = document.querySelector('.navhidden');
    const userBtn = document.getElementById('userBtn');
    const settings = document.getElementById('settings');
    const userBtnDown = document.getElementById('userBtnDown');
    const userBtnUp = document.getElementById('userBtnUp');


    openNavBtn.addEventListener('click', () => {
        openNavBtn.style.display = "none"
        navhidden.style.display = "block"
        closeNavBtn.style.display = "block"
    })
    closeNavBtn.addEventListener('click', () => {
        closeNavBtn.style.display = "none"
        navhidden.style.display = "none"
        openNavBtn.style.display = "block"

    })

    userBtn.addEventListener('click', (e) => {

        if (settings.style.display === "none") {
            settings.style.display = "block"
            userBtnDown.style.display = "none"
            userBtnUp.style.display = "inline"

        } else {
            settings.style.display = "none"
            userBtnUp.style.display = "none"
            userBtnDown.style.display = "inline"

        }

    })

    // const btn = document.getElementById("download");
    // btn.addEventListener("click", () => {
    //     const doc = new jsPDF();
    //     const pdfContent = document.getElementById("pdfContent");
    //     doc.fromHTML(pdfContent);
    //     doc.save("recipe.pdf");
    // });


    document.getElementById('download')
        .addEventListener('click', () => {
            const element = document.getElementById('pdfContent');
            const recipeTitle = document.getElementById('recipeTitle').textContent;
            const options = {
                filename: `${recipeTitle}.pdf`,
                // filename: 'recipe.pdf',
                margin: 0.2,
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(options).from(element).save();
        });
</script>

</html>
