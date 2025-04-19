<?php
if (!isset($_SESSION['username'])) {
    header("location:../index2.php");
}
