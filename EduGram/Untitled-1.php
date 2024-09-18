<!DOCTYPE html>
<html>

<head>
    <title>Edugram</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text css" rel="stylesheet" href="css/material.css">
    <link type="text/css" rel="stylesheet" href="fonts/font.css">
    <link rel="icon" href="images/icon.png">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <style>
        /* Your custom CSS styles here */
    </style>
</head>

<body id="_1">
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Edugram</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Sign Up</a>
                </li>
                <?php
                } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categories.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ask.php">Ask Question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php" onclick="loadPhpFile();">Hi, <?php echo $_SESSION["user"]; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-box">
                    <center>
                        <div class="heading">
                            <h1 class="logo">Edugram</h1>
                            <p class="tag-line">Where questions are themselves the answers</p>
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="input-group">
                                <input name="text" id="search" type="text" class="form-control"
                                    placeholder="Looking for Answers to Some Question, simply just search here...">
                                <div class="input-group-append">
                                    <input name="submit" type="submit" value="Search" class="btn btn-primary" id="qsearch">
                                </div>
                            </div>
                        </form>
                    </center>
                </div>
                <div class="pop" id="ta">
                    <h1><b style="font-size: 1.5em; margin: -60px auto 10px; display: block;">:(</b>Sorry, Your search didn't
                        match any documents.</h1>
                </div>
                <div class="pop" id="tb">
                    <center>
                        <h1><b style="font-size: 1.5em; margin: -60px auto 10px; display: block;">:)</b>Thank You For Your
                            Answer.</h1>
                    </center>
                </div>
                <!-- Your search results and other content here -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        &copy; 2022 &bull; Edugram
    </footer>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
