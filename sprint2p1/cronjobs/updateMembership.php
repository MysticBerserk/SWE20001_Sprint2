<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

checkMembershipExpireCron($conn);

mysqli_close($conn);
?>