<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $db = mysqli_connect('localhost', 'root', '', 'lab');
                $query = "SELECT * FROM user WHERE ID=$id";
                $q = mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($q);
                $data = $row;
                // var_dump($data);
                // die();
            }
        ?>
        <!-- Default form register -->
        <form class="text-center border border-light p-5" method="post" action="update.php" style="text-align: left !important;">

            <p class="h4 mb-4">Edit</p>
            <input hidden type="text" id="id" name="id" value="<?php echo($data['ID']) ?>">
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name" value="<?php echo($data['firstname']) ?>">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name" value="<?php echo($data['lastname']) ?>">
                </div>
            </div>
            <!-- E-mail -->
            <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" value="<?php echo($data['email']) ?>">
            <!-- Phone number -->
            <input type="text" id="phonenumber" name="phonenumber" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php echo($data['phonenumber']) ?>">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                Optional - for two step authentication
            </small>

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit" name="reg_user">Update</button>
        </form>
    </body>
</html>