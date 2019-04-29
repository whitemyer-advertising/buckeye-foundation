<?php 
foreach($_POST as $k => $v) 
{
$$k=addslashes(strip_tags($v));
}
/*
// Process form
//echo $_POST['formkey'].'--'.$_SESSION['formkey'].'--'.$_POST['submit'];
if(isset($_POST['submit']) && $_POST['formkey'] == $_SESSION['formkey'])
	{
	// Process
//	echo 'processed';
	$process = 'process';
	}
else 
	{
//	echo 'not processed';
	$process = '';
	}
$_SESSION['formkey'] = mt_rand(1, 1000);
*/
?>