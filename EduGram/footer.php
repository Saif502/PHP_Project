


<!DOCTYPE html>
<head>
    
    <style>
    footer{
        margin-top:215px;
    }
    footer a {
        color: #fff;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }

    footer ul.list-inline li {
        font-size: 15px;
    }

    .container1 h5 {
        color: #fff;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .list-inline {
            text-align: center;
        }

        .list-inline-item {
            margin: 10px;
        }
    }

    </style>
</head>
<body>
<footer class="bg-dark text-white py-5">
    <div class="container1">
        <div class="row" style=" margin-left:10px;" >
            <div class="col-md-5">
                <h5>About Edugram</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed lorem ac arcu egestas luctus.</p>
            </div>
            <div class="col-md-4" >
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Ask Question</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Follow Us</h5>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-2x"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-2x"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin fa-2x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <p>&copy; 2023 Edugram. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>