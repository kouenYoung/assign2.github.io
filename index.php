
<!DOCTYPE HTML>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
        <title>Hw2</title>
    </head>

    <body>
        <h2><center>Create an account! &
                    View your ratings!   
</center></h2>


<center><form method="POST" action="">
<h4>Creat an Account </h4>
Username: <input type="text" name="username1" /><br>
Password: <input type="text" name="password" /><br>
<input type="submit" name="register" value="Register"/><br><br>
  </form>



    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music-db";

        $conn = new mysqli($servername, $username, $password, $dbname);

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
                        echo "Please enter the correct Username or Password <br><br>";
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
    ?>

<form method="POST" action="">
<h4> Retrieve Song Ratings by Username </h4>
Username: <input type="text" name="username2" /><br>

  <input type="submit" name="retrieve" value="Retrieve"/><br><br>
  </form>
        

<?php
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
               if(empty($newArray)){
                   echo "No ratings available<br><br>";
               }

            }


            else {
                echo "Please enter a Username<br><br>";
            }
        }


        $conn->close();
        ?>
  
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