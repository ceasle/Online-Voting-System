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
            font-size: 6rem;
            margin: 0;
            float: right;
            padding-top: 30%;

            padding-right: 40px;
        }

        .ff {
            align-content: center;
            margin-top: 25%;
            padding: 15px;
            margin-left: 25%;
            width: 50%;
            background-color: #fcd1d1d6;
            text-align: center;
            opacity: 100%;
            border-radius: 30px;
        }

        .container {
            height: 100%;
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

        #loginbtn:hover {
            background-color: #9a9898;
        }
    </style>
</head>

<body class="xxx">
    <div class="container">
        <div id="headerSection">
            <h1 class="hh">Online Voting</h1><br>
            <h1 class="hh" style="padding:0;padding-right: 40px;"> System</h1>
        </div>
        <div id="loginSection">
            <img src="fin.jfif">
            <div class="ff">
                <h2>Login</h2>
                <form action="api/login.php" method="POST">
                    <input type="number" name="mob" placeholder="Enter mobile" class="ip" required><br><br>
                    <input type="password" name="pass" placeholder="Enter password" class="ip" required><br><br>
                    <select name="role" class="ip y">
                        <option value="1">Voter</option>
                        <option value="2">Candidate</option>
                    </select><br><br>
                    <button id="loginbtn" type="submit" name="loginbtn" class="btn">Login</button><br><br>
                    <a class="reg" href="routes/registerV.php">Register New Voter </a><br>
                    <a class="reg" href="routes/registerC.php">Register New Candidate </a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>