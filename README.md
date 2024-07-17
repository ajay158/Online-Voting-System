# Online-Voting-System

In this website, I have created a online voting system where people can vote online.

<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
}

?>
