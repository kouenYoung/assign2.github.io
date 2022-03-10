<!--
  COMP 333 Software Engineering (Dr. Sebastian Zimmeck) - Assgiment 2
  Authors: Luke Morrill, Noah Hartzfeld, Henry Yang
-->

<!DOCTYPE HTML>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title> Registration/Log-in </title>
      <link rel="stylesheet" href="./style.css">
      <link rel="icon" href="assets/avatar_small.ico">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  </head>

  <body>
  <div class="container">
  <h1>Welcome!<br>ʕ•́ᴥ•̀ʔっ♡</h1>

  <div class="box">
    <!-- REGISTRATION -->
    <div class="box-child1">
      <form method="POST" action="" id="form_reg">
        <h2 class="title">Create an Account</h2>
        <input type="text" name="username1" placeholder="Username"><br>
        <input type="text" name="password" placeholder="Password">
        <button type="submit" name="register" class="button submit" form="form_reg">Register</button><br>
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
                echo '<div class="msg-error">You already have an account!</div>';
              }

              else{
                echo '<div class="msg-error">Please enter the correct Username or Password!</div>';
              }

            }

            else{
              $sql_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
              mysqli_query($conn, $sql_query);
              echo '<div class="msg-success">User succesfully added!</div>';
            }

          }

          else {
            echo '<div class="msg-error"> Please enter Username and Password!</div>';
          }
        }
      ?>
    </div>

    <!-- SONG RETRIEVAL -->
    <div class="box-child2">
      <form method="POST" action="" id="form_song">
        <h2 class="title"> Retrieve Song by Username </h4>
        <input type="text" name="username2" placeholder="Username">
        <button type="submit" name="retrieve" class="button submit" form="form_song">Retrieve</button><br>
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
                   echo '<div class="msg-error">No rating available!</div>';
               }

            }

            else {
                echo '<div class="msg-error">Please enter a Username!</div>';
            }
        }
        $conn->close();
      ?>

      <div class="sql-query">
        <p>
          <?php
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
          ?>
        </p>
      </div>
    </div>

  </div>
  </div>
  </body>
</html>
