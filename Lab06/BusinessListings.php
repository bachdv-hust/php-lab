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
            print "Business Listings</font><br>";

            $query = "SELECT CategoryID, Title FROM categories";
            $results_id = mysqli_query($connect,$query);
        ?>

        <form action="" method="post">
            <table style="width:100%">
                <th style="width:30%"></th><th></th>
                <tr>
                    <td>
                        <table style="width:100%" border=1>
                            <th>Click on a category to find business listings:</th>
                            <?php

                            if ($results_id) {
                                while ($row = $results_id->fetch_assoc()) {
                                    print '<tr><td><a href="6_7.php?act=' . $row['CategoryID']. '">' .$row['Title']. '</a></td></tr>';
                                }

                            } else {
                                die("Query=$query failed!");
                            }
                            ?> 
                        </table>
                    </td>
                    <td>
                        <table style="width:100%" border=1>
                            <?php
                                if(isset($_GET['act'])){
                                    $queryBusiness = "SELECT b.BusinessID, b.Name, b.Address, b.City, b.Telephone, b.URL, bc.BusinessID, bc.CategoryID "
                                                    . "FROM businesses as b "
                                                    . "INNER JOIN biz_categories as bc ON bc.BusinessID = b.BusinessID "
                                                    . "INNER JOIN categories as c ON c.CategoryID = bc.CategoryID "
                                                    . "WHERE c.CategoryID LIKE '" .$_GET['act']. "'";
                                    $result = $connect->query($queryBusiness);
                                    if($result){
                                        while($b = $result->fetch_assoc()){
                                            print '<tr>';
                                            foreach($b as $field){
                                                print '<td>' .$field. '</td>';
                                            }
                                            print '</tr>';
                                        }
                                    }else{
                                        die("Query=$queryBusiness failed!");
                                    }mysqli_close($connect);
                                }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>