<?php
    include "connect.php";
    error_reporting(0);
    $p_name = $_REQUEST['name'];
    $p_price = $_REQUEST['price'];
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);

    if(!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)){
        // echo "upload not complete";
    }

    $p_pic = $target_file;
    $sql = 'insert into product values("","'.$p_name.'",'.$p_price.',"'.$p_pic.'")';
    $result = mysqli_query($conn,$sql);
    


    if($_REQUEST['action']='delete'){
        $del = 'delete from product where p_id='.$_REQUEST['p_id'].'';
        mysqli_query($conn,$del);
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <!-- title -->
        <div class="row">
            <div class="col-12 text-center">
                <h1 id="title">Product</h1>
            </div>
        </div>

        <!-- add product -->
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- add -->
                <form action="index.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input class="form-control" type="number" name="price">
                    </div>

                    <div class="form-group">
                        <label for="">Picture</label>
                        <input class="form-control-file"type="file" name="pic">
                    </div>

                    <input class="btn btn-success" type="submit" value="Submit">

                </form>
            </div>
        </div>

        <!-- detail product -->
        <div class="row">
            <div class="col-12">
                <!-- product detail -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">รหัสสินค้า</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ราคาสินค้า</th>
                            <th scope="col">รูป</th>
                            <th scope="col">#</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            
            $sql = 'select * from product';
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                <th scope="row">'.$row['p_id'].'</th>
                <td>'.$row['p_name'].'</td>
                <td>'.$row['p_price'].'</td>
                <td><img id="p_img" src="'.$row['p_pic'].'"></td>
                <td><a class="btn btn-danger" href="?action=delete&p_id='.$row['p_id'].'">Delete</a></td>
                <td><a class="btn btn-info"href="edit.php?p_id='.$row['p_id'].'">Edit</a></td>
            </tr>';
            }
        
        ?>
                    </tbody>


                </table>

            </div>
        </div>

    </div>






    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>