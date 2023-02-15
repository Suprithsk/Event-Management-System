<?php

    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"ems");
    
    $query="insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[passR]')";
    $query_run=mysqli_query($connection,$query);

?>
<script>
     alert('registration done! cool')
     window.location.href="user_dashboard.php";
</script>
