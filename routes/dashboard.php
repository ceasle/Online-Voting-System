<?php
    session_start();
    include("../api/connection.php");
    if(!isset($_SESSION['id'])){
        header("location: ../");
    }
    $data = $_SESSION['data'];
    $vid=$_SESSION['id'];
    $position= $_SESSION['position'];
    $checker=mysqli_query($connect,"select * from status where id='$vid' and position='$position' "); 
    $stat=mysqli_num_rows($checker);
    $flag=0;
    if($stat>0){
        $flag=1;
        $status = '<b style="color: green">Voted</b>';
    }
    else{
        $status = '<b style="color: red">Not Voted</b>';
    }
?>


<html>
    <head>
        <title>Online voting system - Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    
        <style>
            body{
                background-color: #FCD1D1;
            }
            .y{
                background-color: #ff9595a1;
                border-bottom: 1px solid #bdc3c7;
    margin-bottom: 10px;
    /* padding: 3rem; */
    height: 20%;
    padding: 1rem;
            }
            .i{
                float: left;
    /* margin: 2rem; */
    margin-right: 2rem;
    height: 100%;
    width: auto;
            }
            .name{
                font-size: 2rem;
            }
            .btn{
                width: 25%;
            height: 4%;
            background-color: #a6a6a6;
            border-radius: 4px;
            }
        </style>
    </head>
    <body>
        
            <center>
            <div id="headerSection">
            <a href="../routes/positions.php"><button id="back-button" style="cursor:pointer;"> Back</button></a>
            <a href="logout.php" ><button id="logout-button" style="cursor:pointer;">Logout</button></a>
            <h1 style="font-family: 'Merriweather', serif; font-size:3rem;">Cast your Vote</h1> 
            </div>
            </center>
            
            <div id="mainSection">
                <div id="profileSection" style="background-color:#ff9595a1;">
                    <div class="data"><img style="float: left;height: 28%;width: auto;margin-right: 2rem;" src="../uploads/<?php echo $data['photo']?>" height="100" width="100"><br>
                </div>
                    <div class="data">
                        <b style="font-size: 1.5rem;">User Details </b><br><br>
                        <b>   Name : </b><?php echo $data['name'] ?><br><br>
                    <b>   Mobile : </b><?php echo $data['mobile'] ?><br><br>
                    <b>   Address : </b><?php echo $data['address'] ?><br><br>
                    <b>   Status : </b><?php echo $status ?>
                    </div>
                </div>
                <div id="groupSection" style="background-color: #FCD1D1;">
                    <?php

                    if(isset($_SESSION['groups'])){
                        $groups = $_SESSION['groups'];
                        for($i=0; $i<count($groups); $i++){
                            ?>
                                <div class="y" style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <img class="i"  src="../uploads/<?php echo $groups[$i]['photo']?>" height="80" width="80">
                                <span class="name" style="font-size:1.5rem;">Candidate Name : </span><b class="name"><?php echo $groups[$i]['name']?></b><br><br>
                                <form method="POST" action="../api/vote.php">
                                <input type="hidden" name="gvotes" value="<?php echo $groups[$i]['votes'] ?>">
                                <input type="hidden" name = "gid" value="<?php echo $groups[$i]['id'] ?>">
                                <?php

                                if($flag==1){
                                    ?>
                                    <button class="" disabled style="padding: 5px; font-size: 15px; background-color: #27ae60; color: white; border-radius: 5px;" type="button"  style="cursor:pointer;">Voted</button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <button class="" style="padding: 5px; font-size: 15px; background-color: #3498db; color: white; border-radius: 5px;" type="submit" style="cursor:pointer;">Vote</button>
                                    <?php
                                }
                                ?>
                                </form>
                                </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <b>No groups available right now.</b>    
                            </div>
                        <?php
                    }  
                    ?>
                </div>
            </div> 
    </body>
</html>