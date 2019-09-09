<?php
echo "<h1> This is the Three Tier Architecture Test</h1>";
echo "<h3> Your Web Running Apache with php on Frontend container </h3>";
echo "<h3> Your APP Running Apache and PHP providing API services for User information on url http://backend/get_user_details </h2>";
echo "<h3> Your Database running Mysql/Mariadb holding user information in userdb on users Table </h1>";
function httpPost($baseurl)
{
$conn = curl_init($baseurl);
curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($conn);
curl_close($conn);
return $response;
}
$backendlb = getenv("BACKENDLB");
$baseurl="http://$backendlb/bootstrap.php";
$response=httpPost($baseurl);
echo $response;
$testurl="http://$backendlb/getusers.php";
$candllabassoc_id=httpPost($testurl);
echo $candllabassoc_id;
?>