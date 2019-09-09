<?php
function querymultirowlab($dbo,$sql)
{
        $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbo->prepare($sql);
        $stmt->execute();
        $r = $stmt->fetchall();
        return $r;
}
$labdbhost_name =  getenv("MY_DB_HOST_READ");
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
$candl_backend_query = "select * from users";
$candl_backend_array = querymultirowlab($dbo, $candl_backend_query );
foreach($candl_backend_array as $value)
{
        echo "Name"."=>".$value['Name']."<br>";
        echo "Age"."=>".$value['Age']."<br>";
        echo "Email"."=>".$value['Email']."<br>";
        echo "==========================================="."<br>";
}
?>