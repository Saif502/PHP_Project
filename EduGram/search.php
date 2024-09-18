<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchTerm = $_POST["search"];
    $sql = "SELECT * FROM question where qus like '%$searchTerm%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0 and $searchTerm != "?" and $searchTerm) {
        while ($row = $result->fetch_assoc()) {
             echo $row["qus"]; 
        }
    } else {
        echo "No records found.";
    }

   
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Google Search bar</title>
	<style>
        #s {
            background-color: #1892f0;
        }
        #container {
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            width: 50%;
        }
        #search_box {
            border-radius: 40px;
            background-color: white;
        }
        #search_form {
            margin: 0;
        }
        #search_input {
            border: none;
            margin: 15px 10px 15px 5px;
            font-size: 20px;
            outline: none;
            color: #17202A;
        }
        #search_button i {
            font-size: 20px;
            margin: 0px 10px;
            color: #0063D4;
        }
        #search_button {
            background: transparent;
            border: none;
            outline: none;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="s">
    <div id="container">
        <div id="search_box">
            <form id="search_form" action="" method="post">
          <button id="search_button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          <input id="search_input" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</div>
</body>
</html>
