<?php
    session_start();
    include("connection.php");
    
    $mobile=$_SESSION['mobile'];
    $pass=$_SESSION['pass'];
    $role=$_SESSION['role'];
    $id=$_SESSION['id'];
    
 
    $position=$_POST['position'];
    $check = mysqli_query($connect, "select * from voter where mobile='$mobile' and password='$pass' and role='$role' ");
    $validpid=mysqli_query($connect,"select * from candidates where position='$position'");
    if(mysqli_num_rows($validpid)>0){
    if(mysqli_num_rows($check)>0){
        $getGroups = mysqli_query($connect, "select a.name, a.photo, b.votes, a.id from voter a,candidates b where a.id=b.id and b.position='$position' ");
        if(mysqli_num_rows($getGroups)>0){
            $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        }
        $data = mysqli_fetch_array($check);
        $_SESSION['id'] = $data['id'];
        $_SESSION['position']=$position;
        $_SESSION['data'] = $data;
        echo '<script>
                alert("Correct!");
                window.location = "../routes/dashboard.php";
            </script>';
    }
    else{
        echo '<script>
                alert("Invalid credentials!");
                window.location = "../";
            </script>';
    }}
    else{
        echo '<script>
                alert("Invalid position ID!");
                window.location = "../routes/positions.php";
            </script>';
       }
    
?>