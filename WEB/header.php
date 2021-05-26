<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6 bg-blue-500">
    <div class="flex items-center flex-shrink-0 text-white mr-6">

        <span class="font-semibold text-xl tracking-tight">Cross La Providence</span>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="accueil.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-yellow-400 mr-4">
                Accueil
            </a>
            <a href="course.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-yellow-400 mr-4">
                Courses
            </a>
            <a href="classement.php" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-yellow-400">
                Classements
            </a>
        </div>
        <div>
            <form method="POST" action="">
                <button class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-red-700 mr-4" name="destroy" type="submit">Deconnexion</button>
            </form>
        </div>
    </div>
</nav>

</html>