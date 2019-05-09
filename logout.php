
<?php

session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('location: login.php');

?>
1
2
3
<script>
  window.location.href = "login.php";
</script>