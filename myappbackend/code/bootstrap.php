<?php
function insertlabassoc($dbo,$sql)
{
        $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbo->prepare($sql);
        $stmt->execute();
}
$labdbhost_name =  getenv("MY_DB_HOST_WRITE");
$labdatabase =  getenv("MY_DB_NAME");
$labusername = getenv("MY_DB_USER");
$labpassword = getenv("MY_DB_PASS");
try
{
        $dbo = new PDO('mysql:host='.$labdbhost_name.';dbname='.$labdatabase, $labusername, $labpassword);
}
catch (PDOException $e)
{
        print "We have trouble in our System we will be back soon.";
        die();
}
$candl_backend_query = "CREATE TABLE IF NOT EXISTS `users` (`id` int(11) NOT NULL AUTO_INCREMENT,  `Name` varchar(50) NOT NULL, `Age` smallint(2) NOT NULL, `Email` varchar(50) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4; INSERT INTO `users` (`id`, `Name`, `Age`, `Email`) VALUES(1, 'Mohan', 18, 'mohanraz@gmail.com'),(2, 'Raj', 22, 'mohan@y2ytech.com'),(3, 'veer', 18, 'mohanraz@gmail.com'),(4, 'Raj', 22, 'mohan@y2ytech.com');";
$candl_backend_array = insertlabassoc($dbo, $candl_backend_query );
?>