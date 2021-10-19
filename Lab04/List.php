<html>
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script language="JavaScript" type="text/javascript">
            function ifDelete(){
                return confirm('Are you sure?');
            }
        </script>
    </head>

    <body>
        <div style="padding-left: 20%;padding-right: 20%; padding-top: 20px">
            <?php
            $db = mysqli_connect('localhost', 'root', '', 'lab');
            $query = "SELECT * FROM user";
            $q = mysqli_query($db, $query);

            // TODO: add link to the registration screen
            echo
            '<a href="./index.php">
            <button type="button" class="btn">&gt &nbsp Sign Up new</button>
            </a>';

            echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-hover">
            <tr>
                <td> <font face="Arial">First name</font> </td>
                <td> <font face="Arial">Last name</font> </td>
                <td> <font face="Arial">Email</font> </td>
                <td> <font face="Arial">Phone</font> </td>
                <td> <font face="Arial">Delete</font> </td>
                <td> <font face="Arial">Edit</font> </td>
            </tr>';

            while ($row = mysqli_fetch_assoc($q)) {
            $field0name = $row["ID"];
            $field1name = $row["firstname"];
            $field2name = $row["lastname"];
            $field3name = $row["email"];
            $field4name = $row["phonenumber"];

            echo '<tr>
                        <td>' . $field1name . '</td>
                        <td>' . $field2name . '</td>
                        <td>' . $field3name . '</td>
                        <td>' . $field4name . '</td>
                        <td>
                            <a type="button" color="red" class="btn btn-danger" href="delete.php?id=' . $field0name . '"'?>
                            onclick="return ifDelete()"<?php echo'>Delete</a></td>
                        <td>
                            <a type="button" color ="green" class="btn btn-success" href="edit.php?id=' . $field0name . '">
                            Edit</a></td>
                    </tr>';
            }
            ?>
        </div>
    </body>
</html>