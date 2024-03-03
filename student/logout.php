<?php
session_start();
session_destroy();
    header("Location:../stud_index.php");
?>