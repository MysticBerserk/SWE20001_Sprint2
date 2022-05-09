<?php
function checkConnection($conn){
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    };
}

function createDatabase($conn){
    $sql = "CREATE DATABASE IF NOT EXISTS swe20001";
    mysqli_query($conn, $sql);
}

function createTableCust($conn){
    $sql = "CREATE TABLE IF NOT EXISTS custdata (
        custID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        custName VARCHAR(128) NOT NULL,
        custEmail VARCHAR(128) NOT NULL,
        custPhone VARCHAR(11) NOT NULL,
        custPassword VARCHAR(128) NOT NULL,
        membershipPayID INT(11) UNSIGNED NOT NULL DEFAULT 0,
        vKey VARCHAR(64) NOT NULL,
        verified TINYINT(1) NOT NULL DEFAULT 0,
        custProfilePicStatus TINYINT(1) NOT NULL DEFAULT 0,
        regDate TIMESTAMP
    )";
    
    mysqli_query($conn, $sql);
}

function createTableAdmin($conn){
    $sql = "CREATE TABLE IF NOT EXISTS admindata (
        adminID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        adminName VARCHAR(128) NOT NULL,
        adminEmail VARCHAR(128) NOT NULL,
        adminPassword VARCHAR(128) NOT NULL
    )";
    
    mysqli_query($conn, $sql);

    $sql = "SELECT * FROM admindata WHERE adminID = 1;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if(!$row = mysqli_fetch_assoc($resultData)){
        $adminName = "Master";
        $adminEmail = "admin1@pinocone.com";
        $adminPassword = "PinoconeSWE20001";
        $sql = "INSERT INTO adminData (adminName, adminEmail, adminPassword) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $adminName, $adminEmail, $adminPassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

function createTablePasswordReset($conn){
    $sql = "CREATE TABLE IF NOT EXISTS passwordreset (
        passResetID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        passResetCustID INT(11) UNSIGNED NOT NULL,
        passResetKey VARCHAR(64) NOT NULL,
        passResetExpires VARCHAR(200) NOT NULL,
        FOREIGN KEY (passResetCustID) REFERENCES custdata(custID) ON DELETE CASCADE
    )";
    
    mysqli_query($conn, $sql);
}

function createTableDeleteAcc($conn){
    $sql = "CREATE TABLE IF NOT EXISTS deleteacc (
        deleteAccID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        deleteAccCustID INT(11) UNSIGNED NOT NULL,
        deleteAccKey VARCHAR(64) NOT NULL,
        deleteAccExpires VARCHAR(200) NOT NULL,
        FOREIGN KEY (deleteAccCustID) REFERENCES custdata(custID) ON DELETE CASCADE
    )";
    
    mysqli_query($conn, $sql);
}

function createTableMembershipPayment($conn){
    $sql = "CREATE TABLE IF NOT EXISTS custmembershippayment (
        membershipPayID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        custID INT(11) UNSIGNED NOT NULL,
        membershipType VARCHAR(40) NOT NULL,
        membershipPrice DECIMAL(5,2) NOT NULL,
        membershipValid TINYINT(1) NOT NULL DEFAULT 1,
        membershipStart TIMESTAMP,
        membershipExpire DATETIME,
        membershipCancelled TINYINT(1) NOT NULL DEFAULT 0,
        reminded TINYINT(1) NOT NULL DEFAULT 0
    )";
    
    mysqli_query($conn, $sql);
}

/*      memberID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
custID INT(11) UNSIGNED NOT NULL,
custMembership TINYINT(1) NOT NULL DEFAULT 0,
custMembershipStart TIMESTAMP,
custMembershipExpire DATETIME,
reminded TINYINT(1) NOT NULL DEFAULT 0,
*/


$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "swe20001";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword);
checkConnection($conn);

createDatabase($conn);

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
checkConnection($conn);

createTableCust($conn);
createTableAdmin($conn);
createTablePasswordReset($conn);
createTableDeleteAcc($conn);
createTableMembershipPayment($conn);