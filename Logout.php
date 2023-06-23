<?php
    include 'koneksi.php';
    session_start();
// Check if the user is already logged in
if (isset($_SESSION['login_time'])) {
    $currentTime = time();
    $lastLoginTime = $_SESSION['loginTime'];
    $elapsedTime = $currentTime - $lastLoginTime;
    
    // Check if the elapsed time is less than 15 minutes (900 seconds)
    if ($elapsedTime < 60) {
        // User is still within the restriction period
        $remainingTime = 60 - $elapsedTime;
        echo "You are restricted from logging in for " . $remainingTime . " seconds.";
        $id = $_SESSION['id'];
        $nama = $_SESSION['name'];
        $status = "Completed";
        
        $sql3 = "DELETE FROM activity where  userid='$id'";
        $activity = mysqli_query($koneksi,$sql3);
        // You can redirect the user or display an appropriate message here.
        exit;
    }
}

// Process the login attempt and set the session variables
// Assuming successful login, set the login time
$_SESSION['login_time'] = time();

// Rest of your login logic and code goes here

?>
<?php
    $id = $_SESSION['id'];
    $nama = $_SESSION['name'];
    $status = "Completed";
    $sql2 = "INSERT INTO loginLogs SET kode ='$id',nama ='$nama',StatusLogs ='$status'";
    $logsql = mysqli_query($koneksi,$sql2);
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    session_destroy();
    header("location:index.php?action=2");
?>