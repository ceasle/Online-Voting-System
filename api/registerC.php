<?php
    include("connection.php");

    $name = $_POST['name'];
    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $add = $_POST['add'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $role1 = 2;
    $position= $_POST['position']; 
    
    $dup_num=mysqli_query($connect,"select * from voter where mobile='$mobile' ");
    if(mysqli_num_rows($dup_num)>0){
     echo '<script>
                alert("Mobile Number Already in Use!");
                window.location = "../routes/registerC.php";
            </script>';
    }
    elseif(strlen($pass)<6){
      echo '<script>
                alert("Password too Small, should be longer than 5 characters!");
                window.location = "../routes/registerC.php";
            </script>';
    }
    elseif($cpass!=$pass){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/registerC.php";
            </script>';
    }
    else{
        move_uploaded_file($tmp_name,"../uploads/$image");
        if($role1==2){
            $insert = mysqli_query($connect, "insert into voter (name, mobile, password, address, photo,role) values('$name', '$mobile', '$pass', '$add', '$image','$role1') ");
        
        $ins = mysqli_query($connect, "select id from voter where mobile='$mobile' ");
        while ($row = mysqli_fetch_array($ins, MYSQLI_NUM)) {
        $temp=$row[0];
        $ri = mysqli_query($connect, "insert into candidates(id,position,votes) values ('$temp','$position' ,0)");
        }
        }
        if($ins){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../";
                </script>';
        }
    }
    
?>