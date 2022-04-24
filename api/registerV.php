<?php
    include("connection.php");

    $name = $_POST['name'];
    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $add = $_POST['add'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $role = 1;
    
    $dup_num=mysqli_query($connect,"select * from voter where mobile='$mobile' ");
    if(mysqli_num_rows($dup_num)>0){
     echo '<script>
                alert("Mobile Number Already in Use!");
                window.location = "../routes/registerV.php";
            </script>';
    }
    elseif(strlen($pass)<6){
      echo '<script>
                alert("Password too Small, should be longer than 5 characters!");
                window.location = "../routes/registerV.php";
            </script>';
    }
    elseif($cpass!=$pass){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/registerV.php";
            </script>';
    }
    else{
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert = mysqli_query($connect, "insert into voter (name, mobile, password, address, photo, role) values('$name', '$mobile', '$pass', '$add', '$image','$role') ");
        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../";
                </script>';
        }
    }
    
?>