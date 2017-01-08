<?php 
session_start();
unset($_SESSION['company_id']);
session_destroy();
location.reload();
?>