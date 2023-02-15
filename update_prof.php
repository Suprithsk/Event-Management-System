<?php
    session_start();
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"ems");
    $query="update users set name='$_POST[name]',email='$_POST[email]',password='$_POST[passR]' where id='$_SESSION[id]'";
    $query_run=mysqli_query($connection,$query);
?>
<script>
    alert("updated successfully");
    window.location.href="user_dashboard.php";
</script>