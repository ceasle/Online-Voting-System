<?php
    session_start();
    include("connection.php");

    $votes = $_POST['gvotes'];
    $total_votes= $votes+1;
    $gid = $_POST['gid'];
    $uid = $_SESSION['id'];
    $postid= $_SESSION['position'];

    $update_votes = mysqli_query($connect, "update candidates set votes='$total_votes' where id='$gid'");
    $update_status = mysqli_query($connect, "insert into status(id,position) values('$uid','$postid')");

    if($update_status and $update_votes){
        $getGroups = mysqli_query($connect, "select a.name, a.photo, b.votes, a.id from voter a, candidates b where role=2 and a.id=b.id and b.position='$postid' ");
        $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
        $_SESSION['groups'] = $groups;
        echo '<script>
                    alert("Voting successfull!");
                    window.location = "../routes/dashboard.php";
                </script>';
    }
    else{
        echo '<script>
                    alert("Voting failed!.. Try again.");
                    window.location = "../routes/dashboard.php";
                </script>';
    }
    
?>