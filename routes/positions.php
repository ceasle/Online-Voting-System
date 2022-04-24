<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../");
}


?>

<html>

<head>
    <title>Online voting system - Home</title>
    <link rel="stylesheet" href="/css/stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
        }

        .xxx {
            background-color: #FCD1D1;
        }

        .ip {
            background-color: #ECE2E1;
            width: 80%;
            height: 5%;
            border-width: 1px;
            text-align: center;
            border-color: #4a4a4a;
            border-radius: 4px;
        }

        .y {
            width: 50%;
            text-align: center;
        }

        .ip:hover {
            background-color: #E9D5DA;
        }

        .hh {
            font-family: 'Merriweather', serif;
            text-align: center;
            font-size: 5rem;
            margin: 0;
            float: right;
            padding-top: 30%;

            padding-right: 40px;
        }

        .ff {
            align-content: center;
            margin-top: 5%;
            padding: 15px;
            margin-left: 25%;
            width: 50%;
            background-color: #a6a6a6bf;
            text-align: center;
            opacity: 100%;
            border-radius: 30px;
            font-size: x-large;
            font-family: 'Merriweather', serif;
        }

        .x {
            margin-top: 20%;
        }

        .val {
            text-align: left;
            height: 20px;
            width: 20px;
        }

        .container {
            height: 100%;
            display: flex;
        }

        .ff h2 {
            font-size: 3rem;
            /* padding-top: 0px; */
            margin-top: 0;
        }

        #headerSection {
            height: 100%;
            text-align-last: center;
            width: 50%;
            display: inline-block;
        }

        #loginSection {
            height: 100%;
            align-self: center;
            width: 50%;
            float: right;
        }

        .btn {
            width: 25%;
            height: 4%;
            background-color: #a6a6a6;
            border-radius: 4px;
        }

        img {
            object-fit: cover;
            float: left;
            position: fixed;
            z-index: -5;
            width: 80%;
            filter: blur(2px);
            /* -webkit-filter: blur(2px); */
            height: 100%;
        }

        .reg {
            text-decoration: none;
            color: #4a4a4a;
        }

        .reg:hover {
            color: #ff0000;
        }

        #loginbtn {
            margin-left: 44%;
            margin-top: 5%;
            padding: 20px 40px;
            font-size: 20px;
            background-color: #a6a6a6;
            border-radius: 8px;
        }

        #loginbtn:hover {
            background-color: #9a9898;
        }
    </style>
</head>

<body class="xxx">
    <div class="container">
        <div id="headerSection">
            <h1 class="hh"> Cast your vote</h1><br>
            <h1 class="hh" style="padding:0;padding-right: 40px;">for different roles</h1>
        </div>
        <div id="loginSection">
            <img src="../download.jfif">

            <form action="../api/positions.php" method="POST">
                <div class="ff x"><input type="radio" id="post0" class="val" name="position" value="0">
                    <label for="post0" class="val">Vice President</label><br>
                </div>
                <div class="ff"><input type="radio" id="post1" class="val" name="position" value="1">
                    <label for="post1" class="val">General secretary - Cult</label><br>
                </div>
                <div class="ff"><input type="radio" id="post2" class="val" name="position" value="2">
                    <label for="post2" class="val">General secretary - Tech</label><br>
                </div>
                <div class="ff"><input type="radio" id="post3" class="val" name="position" value="3">
                    <label for="post3" class="val">General secretary - Sports</label><br>
                </div>
                <button id="loginbtn" type="submit" name="loginbtn">Vote</button><br>
            </form>

        </div>
    </div>
    <script>

    </script>
</body>

</html>