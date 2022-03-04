
<!DOCTYPE HTML>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
        <title>First PHP and SQL Example</title>
    </head>

    <body>
        <p>This is our first PHP and SQL example of a dynamically served 
            web page!</p>


<form method="POST" action="">
Username: <input type="text" name="username1" /><br>
Password: <input type="text" name="password" /><br>
<input type="submit" name="register" value="Register"/><br>
  </form>



    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music-db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully <br><br>";

        $newArray = array();

        if(isset($_REQUEST["register"])){
            $out_value = "";
            $username = $_REQUEST['username1'];
            $password = $_REQUEST['password'];
            if(!empty($username) && !empty($password)){
               $sql_query = "SELECT * FROM users WHERE username = ('$username')";
               $result = mysqli_query($conn, $sql_query);
               $row = mysqli_fetch_assoc($result);
               

               if($row != 0){
                   $out_pass = $row['password'];
                   $sql_query = "SELECT * FROM users WHERE password = ('$password')";
                   $result = mysqli_query($conn, $sql_query);
                   $row = mysqli_fetch_assoc($result);
                   
                   if($out_pass == $password){
                       echo "You already have an account<br><br>";
                    }

                    else{
                        echo "Please enter the correct Username or Password";
                    }
                    
                }
               
                else{
                    $sql_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
                    mysqli_query($conn, $sql_query);
                    echo "User succesfully added!<br><br>";
                }

        }    
            
        else {
            echo "Please enter Username and Password";
        }

    }
        


        if(isset($_REQUEST["retrieve"])){
            $out_value = "";
            $username = $_REQUEST['username2'];

            if(!empty($username)){
                $sql_query = "SELECT * FROM ratings WHERE username = ('$username')";
                $result = mysqli_query($conn, $sql_query);
               while($row = mysqli_fetch_assoc($result)){
                $out_song = $row['song'];
                $out_rating = $row['rating'];

				$newArray[] = $out_song ;
				$newArray[] = $out_rating ;

			   }


            }
            else {
                $out_value = "No grade available!";
            }
        }


        $conn->close();
        ?>

<form method="POST" action="">
<hd3> Retrieve Songs by Username </hd3><br>
Username: <input type="text" name="username2" /><br>

  <input type="submit" name="retrieve" value="Retrieve"/>
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