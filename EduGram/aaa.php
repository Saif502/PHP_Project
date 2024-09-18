<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
</head>
<body>
    <!-- Your website content -->

    <a id="gobackButton" href = "#">Go Back</a>

    <script>
        // Go back to the previous page when a button is clicked
        document.getElementById("gobackButton").addEventListener("click", function() {
            window.history.back();
        });
    </script>
</body>
</html>
