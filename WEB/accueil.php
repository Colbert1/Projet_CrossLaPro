<?php
include "header.php";
include "navbar.php";
?>
<title>Accueil</title>
</head>
</head>

<body class="bg-blue-300 h-screen">
    <div class="mb-8 text-center">
        <p class="text-black text-opacity-100 text-xl">Bonjour <?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . ' <br> ' ?> Où souhaitez-vous aller ?</p>
    </div>
    <div class="container mx-auto flex justify-center grid justify-items-start m-56">
        <ul>
            <div class="text-center">
                <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2">
                    <a href="course.php">Page course
                </button>
            </div>
            <div class="text-center">
                <button class="bg-blue-800 hover:bg-yellow-300 text-white hover:text-black font-bold py-2 px-4 rounded m-2">
                    <a href="classement.php">Page classement</a>
                </button>
            </div>
        </ul>
    </div>
</body>

</html>