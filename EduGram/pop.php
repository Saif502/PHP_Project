<!DOCTYPE html>
<html>
<head>


    <title>Pop-up Page Example</title>
    <style>

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    width: 70%;
    text-align: center;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
#saveAndChanges {
        color: blue; /* Set the default text color */
        text-decoration: none; /* Remove the default underline */
        transition: color 0.3s; /* Add a smooth transition effect for the color change */
    }

    #saveAndChanges:hover {
        color: red; /* Change the text color on hover */
    }


    </style>
</head>
<body>
    <a href = "#" id="openPopupButton">  <i class="fas fa-edit"></i> &nbsp;  </a>
   
    <!-- The modal -->
    <div id="popupModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closePopupButton">&times;</span>
        <h2>Pop-up Content</h2>
        <p>This is the content of the pop-up page.</p>
        <a href="#" id="saveAndChanges">Save and Changes</a>
    </div>
</div>

    <script src="pop.js"></script>
</body>
</html>
