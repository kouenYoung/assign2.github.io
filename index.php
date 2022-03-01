
<!DOCTYPE HTML>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
        <title>First PHP and SQL Example</title>
    </head>

    <body>
        <p>This is our first PHP and SQL example of a dynamically served 
            web page!</p>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music-db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";



        if(isset($_REQUEST["submit"])){
            $out_value = "";
            $username = $_REQUEST['username'];

            if(!empty($username)){
                $sql_query = "SELECT * FROM ratings WHERE username = ('$username')";
                $result = mysqli_query($conn, $sql_query);
				$newArray = array();
               while($row = mysqli_fetch_assoc($result)){
                $out_song = $row['song'];
                $out_rating = $row['rating'];

				$newArray[] = $out_song ;
				$newArray[] = $out_rating ;

			   }


            }
            else {
                $out_value = "No rating available!";
            }
        }

        $conn->close();
        ?>

<form method="POST" action="">
  Username: <input type="text" name="username" placeholder="Username:" /><br>
  <input type="submit" name="submit" value="Submit"/>
  </form>
  
  <p><?php 

$counter = 0 ;
  foreach($newArray as $item){
	  echo $item ;
	  if ($counter % 2 == 0) {
		  echo " -> " ;
		  
	  }
	  else{
		  echo "</br>" ;
	  }
	  
	  $counter += 1;
  }
  ?></p>
  

    </body>
</html>