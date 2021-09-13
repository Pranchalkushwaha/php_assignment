<?php
    $url="localhost";
    $username="root";
    $password="";
    $conn=mysqli_connect($url,$username,$password,"php_assignment");
    $response = array();


?>

<html>
    <head>
        <title>
            Php and Mysql
        </title>
    </head>
    <body>
        <form action="index.php" method = "post">
            <label for="link">Enter the link:</label>
            <input type="text" name="link" id = "link">
            <button>Search</button>
        </form>
        
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $link = $_POST['link'];
                $str = array();
                $str = explode("=",$link);

                if($conn){
                    $sql = "select * from keyword_table where keyword = '$str[1]'";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){
                         $tableName = $row['table_name'];
                         $i++;
                        }
                    }
                
                    $sql = "select * from $tableName";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){
                         echo $row['name'];
                         echo " ";
                         echo $row['age'];
                         echo " ";
                         echo $row['email'];
                         ?>
                         <br>
                         <?php
                         $i++;
                        }
                    }
                 }
                 else{
                     echo "connection failed";
                 }
            }

        
        ?>
        
    </body>
</html>