<?php
include "header.php";
include "navbar.php";
?><title>Information(s) Course</title>
</head>

<body class="bg-blue-300 h-screen">
    <div class="container">
        <div>
            <?php
            $infoCourse = new Course($bdd);
            $infoCourse->afficheInfoCourse();
            ?>
        </div>
    </div>
</body>