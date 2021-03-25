<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style/css/home.css">
    <!-- <link rel="stylesheet" href="style/css/login.css"> -->
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header class="mb-auto fixed-top">
            <div>
                <h3 class="float-md-start mb-0">E-Recoding</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    <a class="nav-link" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?action=\signin') ?>">Signin</a>
                    <a class="nav-link" href="/signup">Signup</a>
                </nav>
            </div>
        </header>

        @content

        <footer class="mt-auto text-white-50 fixed-bottom">
            <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a
                    href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
        </footer>

    </div>
</body>

</html>