<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/index-css.css" rel="stylesheet" type="text/css"/>
    <title>Document</title>
</head>
<body>
<?php 
if(isset($_GET['action'])){
	if($_GET['action'] == "1"){ ?>
    <script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'error',
        title: 'Login Failed !'
      })

    </script>
  <?php
	}
  if($_GET['action'] == "2"){ ?>
    <script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'success',
        title: 'Logout was Succesfully !'
      })

    </script>
  <?php
	}
  if($_GET['action'] == "3"){ ?>
    <script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'warning',
        title: 'You are not logged in !'
      })

    </script>
  <?php
	}
}
?>
    <div class="box">
        <div class="container">
            
                <img class="img-logo" src="image/Logo.png"/>
            
            <form action="CheckLogin.php" method="post">
                <div class="input-filed">
                    <input type="text" name="username" class="input" placeholder="Username" required>
                    <i class="bx"><ion-icon name="person-outline"></ion-icon></i>
                </div>
                <div class="input-filed">
                    <input type="password" name="password" class="input" placeholder="Password" required>
                    <i class="bx"><ion-icon name="lock-closed-outline"></ion-icon></i>
                </div>
                <div class="input-filed">
                    <input type="submit" class="submit" value="submit">
                </div>
                <div class="remember-forgot">
                  <label><input type="checkbox" name="remember[]" value="1">Remember me</label>
                  <a href="#">Forgot Password?</a>
                </div>
                
            </form>
            
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>