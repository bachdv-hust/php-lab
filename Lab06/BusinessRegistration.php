<html>
    <head>
        <title>Table Output</title>
    </head>
    
    <body>
        <?php
            $host = 'localhost:3308';
            $user = 'root';
            $passwd = 'bgtcamfa00';
            $database = 'business_service';
            $connect = mysqli_connect($host, $user, $passwd);
            $table_name = 'businesses';

            mysqli_select_db($connect,$database);
        
            if (isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["phone"]) && isset($_POST["url"])
                    && isset($_POST['categories'])) {
                $name = $_POST["name"];
                $address = $_POST["address"];
                $city = $_POST["city"];
                $phone = $_POST["phone"];
                $url = $_POST["url"];
                $categories = $_POST['categories'];
                $insertquery = "Insert into $table_name(`Name`, `Address`, `City`, `Telephone`, `URL`) value('$name','$address', '$city', '$phone', '$url');";
            
                $connect->query($insertquery);
            
                $lastestBusiness = "Select BusinessID from $table_name order by BusinessID desc limit 1";
                $id = $connect->query($lastestBusiness);
                $idNew = $id->fetch_assoc();
            
                foreach ($categories as $cate){
                    $insertquery = "Insert into biz_categories value(" .$idNew['BusinessID']. ",'$cate');";
                    
                    $connect->query($insertquery);
                }
            
            }
            print '<font size="5" color="blue">';
            print "Business Registration</font><br>";

            $query = "SELECT CategoryID, Title FROM categories";
            $results_id = mysqli_query($connect,$query);
        ?>
        
        <form action="" method="post">
            <table style="width:100%">
                <th style="width:30%"></th><th></th>
                <tr>
                    <td> Click on one, or control-click on multiple categories <br>
                        <select name="categories[]" size="4" multiple="multiple" tabindex="1">
                        <?php

                        if ($results_id) {
                            while ($row = $results_id->fetch_assoc()) {
                                print '<option value="' . $row['CategoryID']. '">' .$row['Title']. '</option>';
                            }

                        } else {
                            die("Query=$query failed!");
                        }mysqli_close($connect);
                        ?> 
                        </select>
                    </td>
                    <td>
                        <table style="width:100%">
                            <th></th><th></th>
                            <tr><td style="width: 20%">Business Name</td><td><input type="text" style="width: 50%" name="name"></td></tr>
                            <tr><td>Address</td><td><input type="text" style="width: 50%" name="address"></td></tr>
                            <tr><td>City</td><td><input type="text" style="width: 50%" name="city"></td></tr>
                            <tr><td>Telephone</td><td><input type="text" style="width: 50%" name="phone"></td></tr>
                            <tr><td>URL</td><td><input type="text" style="width: 50%" name="url"></td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            <br /><input type="submit" value="Add Business">
        </form>
    </body>
</html>