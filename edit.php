<?php
    include 'connect.php';
    error_reporting(0);
    $p_name = $_REQUEST['name'];
    $p_price = $_REQUEST['price'];
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $p_pic = $target_file;
    // $sql = 'UPDATE `product` SET `p_name`="'.$p_name.'",`p_price`='.$p_price.'" WHERE p_id ='.$_REQUEST['p_id'].'';
    $sql = 'update product set p_name="'.$p_name.'" , p_price='.$p_price.',p_pic="'.$p_pic.'" where p_id='.$_REQUEST['p_id'].'';
    mysqli_query($conn,$sql);
  

    if(!move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)){
        // echo "upload not complete";
    }

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <!-- title -->
        <div class="row">
            <div class="col-12 text-center">
                <h1 id="title">Edit data</h1>

            </div>
        </div>

        <!-- data for edit -->
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>รหัสสินค้า</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคาสินค้า</th>
                            <th>รูป</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
            
                            $sql = 'select * from product where p_id='.$_REQUEST['p_id'].'';
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result)){
                                echo '<tr>
                                <th>'.$row['p_id'].'</th>
                                <td>'.$row['p_name'].'</td>
                                <td>'.$row['p_price'].'</td>
                                <td><img id="p_img" src="'.$row['p_pic'].'"></td>
                            </tr>';
                            }
                        
                        ?>
                    </tbody>



                </table>

            </div>

        </div>

        <!-- form edit -->
        <div class="row">
            <div class="col-12">
                <form action='edit.php' method="post" enctype="multipart/form-data">
                    <div class="form-group">

                        <input type="hidden" name="p_id" value=<?php echo $_REQUEST['p_id'] ?>>
                        <label for="">Name</label>
                        <input class="form-control" type="text" name='name' placeholder="new name">
                    </div>

                    <div class="form-group">

                        <label for="">Price</label>
                        <input class="form-control" type="number" name='price' placeholder="new price">
                    </div>

                    <div class="form-group">
                        <label for="">Picture</label>
                        <input class="form-control" type="file" name="pic">
                    </div>


                    <input class="btn btn-success" type="submit" value="Submit">
                </form>

                <a class="btn btn-primary" href="index.php">Back</a>
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