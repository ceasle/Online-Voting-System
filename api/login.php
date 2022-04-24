<?php
    session_start();
    include("connection.php");

    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
 
    $check = mysqli_query($connect, "select * from voter where mobile='$mobile' and password='$pass' and role='$role' ");
 
    if(mysqli_num_rows($check)>0){
        $getGroups = mysqli_query($connect, "select a.name, a.photo, b.votes, a.id from voter a,candidates b where a.id=b.id ");
        if(mysqli_num_rows($getGroups)>0){
            $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        }
        $data = mysqli_fetch_array($check);
        $_SESSION['id'] = $data['id'];
        $_SESSION['pass'] = $pass;
        $_SESSION['role'] = $role;
        $_SESSION['data'] = $data;
        $_SESSION['mobile'] = $mobile;
        echo '<script>
                window.location = "../routes/positions.php";
            </script>';
    }
    else{
        echo '<script>
                alert("Invalid credentials!");
                window.location = "../";
            </script>';
    }
    
?>