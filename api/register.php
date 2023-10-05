<?php
    include("connection.php");

    $name = $_POST['name'];
    $mobile = $_POST['mob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $add = $_POST['add'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $role = $_POST['role'];
    if(!(preg_match("/([a-zA-Z' ]+)$/", $tmp_name)))
    {
        echo '<script>
        alert("Please Enter Only Characters for Name!!");
        window.location = "http://localhost/routes/register.php";
            </script>';
    }
    if(strlen($mobile)!=10)
    {
        
        // echo scrit window.location = "../index1.php";
        echo '<script>
        alert("Name Must be only !!");
        window.location = "http://localhost/routes/register.php";
            </script>';

    }
    if($cpass!=$pass){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/register.php";
            </script>';
    }
    else{
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert = mysqli_query($connect, "insert into user (name, mobile, password, address, photo, status, votes, role) values('$name', '$mobile', '$pass', '$add', '$image', 0, 0, '$role') ");
        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../index1.php";
                </script>';
        }
    }
    
?>