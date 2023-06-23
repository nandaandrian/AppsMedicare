<?php
session_start();
  include 'koneksi.php';

  $currentTimestamp = time();
  $currentDateTime = date('H:i:s', $currentTimestamp);

  echo "Current date and time: " . $currentDateTime;
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $remember = $_POST['remember'][1];

      $sql = "SELECT * FROM users where username = '$username' and password = '$password'";
      $query = mysqli_query($koneksi, $sql);
      $data = mysqli_fetch_assoc($query);
      $Out = mysqli_num_rows($query);
        
        $sql4 = "SELECT * FROM activity";
        $validactivity = mysqli_query($koneksi,$sql4);
        $active = mysqli_fetch_assoc($validactivity);
        $useridon = $active['username'];
        



      
      if($Out > 0){
        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['nama'];
        $_SESSION['user'] = $data['username'];
        $_SESSION['loginTime'] = time();
        if($data['username'] == $useridon){
          header("Location:index.php?action=1");
          
        }else{
          if($data['role'] == 'admin'){
            header("Location:admin/admin.php");
          } else {
            
  
            header("Location:Dashboard.php");
          }
          
          
          
        }
        


        if($remember == "1"){
          $cookie_name = "cookie_username";
          $cookie_value = $username;
          $cookie_time = time() + (60 * 60 * 24 * 30);
          setcookie($cookie_name, $cookie_value, $cookie_time, "/");
  
          $cookie_name = "cookie_password";
          $cookie_value = $password;
          $cookie_time = time() + 60 * 60 * 24 * 30;
          setcookie($cookie_name, $cookie_value, $cookie_time, "/");
         }
        
      }else{
        header("Location:index.php?action=1");
      }
?>