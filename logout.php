<?php
session_start();
session_destroy();
echo"<script>window.location='http://localhost/projects/rms/home.php'</script>";
?>