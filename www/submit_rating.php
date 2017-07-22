<?php
# Turn off all error reporting
error_reporting(0);
#receiving ajax request
foreach($_POST as $key=>$value)
{
if (($value=="")or(NULL===$value))
{
echo "All fields are compulsory";
exit;
}//end of if
else
{
$postdata[$key]=$value; //$postdata['star']
}//end of else
}//end of foreach

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "feedback";

// Create connection
$dbh = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
// Check connection
if(!$dbh){
	echo "Database connection issue!!";
	exit;
}

	$query  ="INSERT INTO rating( rating,comment) VALUES( ?,?)";
	$sth = $dbh->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$excute=$sth->execute(array($postdata['star'],$postdata['comment']));
	if(! $excute )
	{
	exit;
	}
	
	echo "Feedback submitted successfully!!";

?>