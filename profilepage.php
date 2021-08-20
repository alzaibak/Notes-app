<?php
session_start();
include('connection.php');

//logout
include('logout.php');

//remember me
include('remember.php');

?>

<!doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap" rel="stylesheet">
    <title>My profile</title>
</head>

<body>
    <!-- navigation bar-->
    <div class="container-fluid navigation">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Notes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="account.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="profilepage.php">My notes</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav pull-rightp">
                        <li class="nav-item">
                            <a class="nav-link active" href="#loginModal" data-bs-toggle="modal">Hello <b>username</b></a>
                        </li>
                        <li class="nav-item">
                            <button type="button" style="margin: 0; padding-top: 8px; padding-left: 0px;" class="btn signup" data-bs-target="#signupModal" data-bs-toggle="modal"> Logout</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <!--body container-->

    <div class=" container">

        <div class="col-md-offset-3 col-md-6 col-12">

        </div>

        <div class="text-align">
            <button id="addnote" class="btn btn-lg yellow" type="button" style="min-width: 10%;"> Add Note</button>
            <button id="edit" class="btn btn-lg yellow" type="button" style="min-width: 10%;"> Edit</button>
            <button id="done" class="btn btn-lg yellow" type="button" style="background-color:#C3F700; min-width: 10%;"> Done</button>
            <button id="allnotes" class="btn btn-lg yellow" type="button" style="min-width: 10%;"> All notes</button>
        </div>

        <div id="notearea">
            <textarea name="" id="textarea" cols="30" rows="10"></textarea>
        </div>

        <div id="notes" class="notes">

        </div>
    </div>



    <!-- footer-->
    <div class="container-fluid navigation footer">
        <div class="container">
            <p style="text-align: center; color: black; margin-top: 5px;">Created By <strong> Alzaibak Mohamad</strong></p>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>