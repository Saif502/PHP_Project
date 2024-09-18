<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
           
            background: url('images/a.jpg') center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #container {
            position: relative;
        }

        #search_box {
            position: absolute;
            text-align: center;
        }

        #search_input {
            padding: 10px;
            font-size: 16px;
        }

        #search_button {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="ss">
        <div id="container">
            <form action="index.php" method="post">
                <div id="search_box">
                    <input id="search_input" type="text" name="search" placeholder="Search...">
                    <button id="search_button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
