<?php 

$content = '';
$error = '';
$task = '';
$first_name = '';
$last_name = '';
$maiden_name = '';
$company = '';
$address = '';
$city = '';
$state_province = '';
$postal_code = '';
$phone = '';
$email = '';
$graduation_year = '';
include 'inc/retrieve_post_variables.php';

//Change the subject of the contact email below
$subject = 'Alumni Information Submission';

if($task == 'email_form')
	{
	if(!isset($first_name) || $first_name == ''){$error .= '<p class="error">First Name is Required</p>';}
	if(!isset($last_name) || $last_name == ''){$error .= '<p class="error">Last Name is Required</p>';}
	if(!isset($address) || $address == ''){$error .= '<p class="error">Address is Required</p>';}
	if(!isset($city) || $city == ''){$error .= '<p class="error">City is Required</p>';}
	if(!isset($state_province) || $state_province == ''){$error .= '<p class="error">State is Required</p>';}
	if(!isset($postal_code) || $postal_code == ''){$error .= '<p class="error">Zip Code is Required</p>';}
	
	if(!isset($phone) || $phone == ''){$phone = '';}
	if(!isset($company) || $company == ''){$company = '';}
	if(!isset($maiden_name) || $maiden_name == ''){$maiden_name = '';}
	if(!isset($graduation_year) || $graduation_year == ''){$graduation_year = '';}
	if(!isset($email) || $email == ''){$email = '';}else{include 'inc/email_validator.php';}

	if($error == '')
		{
		$mail_body = '
			<table id="email" width="600" border="0" cellspacing="0" cellpadding="5">
				<tr>
					<td width="150"><strong>First Name:</strong></td>
					<td width="450">'.$first_name.'</td>
				</tr>
				<tr>
					<td width="150"><strong>Last Name:</strong></td>
					<td width="450">'.$last_name.'</td>
				</tr>
				<tr>
					<td width="150"><strong>Maiden Name:</strong></td>
					<td width="450">'.$maiden_name.'</td>
				</tr>
				<tr>
					<td width="150"><strong>Company:</strong></td>
					<td width="450">'.$company.'</td>
				</tr>
				<tr>
					<td width="150"><strong>Address:</strong></td>
					<td width="450">'.$address.'</td>
				</tr>
				<tr>
					<td width="150"><strong>City:</strong></td>
					<td width="450">'.$city.'</td>
				</tr>
				<tr>
					<td width="150"><strong>State:</strong></td>
					<td width="450">'.$state_province.'</td>
				</tr>
				<tr>
					<td width="150"><strong>Zip Code:</strong></td>
					<td width="450">'.$postal_code.'</td>
				</tr>
				<tr>
					<td width="150"><strong>Phone:</strong></td>
					<td width="450">'.$phone.'</td>
				</tr>
				<tr>
					<td width="150"><strong>Email:</strong></td>
					<td width="450">'.$email.'</td>
				</tr>
				<tr>
					<td width="150"><strong>Graduation Year:</strong></td>
					<td width="450">'.$graduation_year.'</td>
				</tr>
			</table>';
	
		$name = $first_name.' '.$last_name;
		include 'inc/send_email.php';
		$content .= '
			<div id="thanks">
				<p>Thank you for subscribing to the Buckeye Career Center Foundation Annual Newsletter.</p>
			</div>';
		}
	else
		{
		$task = 'form';
		}
	}
if($task == 'form' || $task == '')
		{
		$content .= '
			<form class="newsletter" name="newsletter" action="inc/send-email.php" method="post">
				<p class="required">*Denotes required information</p>
				<div class="cf"><label><span>*</span>First Name</label><input name="first_name" id="first_name" value="'.$first_name.'"/></div>
				<div class="cf"><label><span>*</span>Last Name</label><input name="last_name" id="last_name" value="'.$last_name.'"/></div>
				<div class="cf"><label>Maiden Name</label><input name="maiden_name" id="maiden_name" value="'.$maiden_name.'"/></div>
				<div class="cf"><label>Company</label><input name="company" id="company" value="'.$company.'"/></div>
				<div class="full cf"><label><span>*</span>Address</label><input name="address" id="address" value="'.$address.'"/></div>
				<div class="cf"><label><span>*</span>City</label><input name="city" id="city" value="'.$city.'"/></div>
				<div class="quarter cf"><label>State</label><input name="state_province" id="state_province" value="'.$state_province.'"/></div>
				<div class="quarter cf"><label>Zip</label><input name="postal_code" id="postal_code" value="'.$postal_code.'"/></div>
				<div class="cf"><label>Phone</label><input name="phone" id="phone" value="'.$phone.'"/></div>
				<div class="cf"><label>Email</label><input name="email" id="email" value="'.$email.'"/></div>
				<div class="quarter cf"><label>Graduation Year</label><input name="graduation_year" id="graduation_year" value="'.$graduation_year.'"/></div>
				<input type="hidden" name="task" value="email_form"/>
				<input class="submit" type="submit" name="submit" value="Submit"/>
			</form>
		
		';
		}
				



?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Buckeye Career Center Alumni | Alumni Directory | New Philadelphia Ohio </title>
<meta name="keywords" content="buckeye career center alumni,new philadelphia,ohio" />
<meta name="description" content= "Stay up to date with happenings and events sponsored by the Buckeye Career Center Foundation." />
<link rel="shortcut icon" href="/img/favicon.ico" type="image/vnd.microsoft.icon">
<link rel="stylesheet" href="/css/styles.css" type="text/css">
<link rel="stylesheet" href="/css/flexslider.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>

<!--[if lt IE 8]>
	<link rel="stylesheet" href="/css/IE7.css" type="text/css">
<![endif]-->

<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery.flexslider.js"></script>
<script src="/js/scripts.js"></script>
</head>

<body>
	<div class="container">
		<?php include('inc/head.php'); ?>
		<div class="content cf">
			<div class="copy">
				<h1>Buckeye Career Center Foundation<br />Alumni Information</h1>
					<?php 
					if(isset($_SERVER['HTTP_REFERER']))
						{
						$refer = $_SERVER['HTTP_REFERER'];
						echo 
							'<p>Stay up to date with happenings and events sponsored by the Buckeye Career Center Foundation. This includes the annual Recognition Banquet where scholarships are awarded to graduating seniors of the Buckeye Career Center.</p>
							<p>Please fill out the form below, and we will provide you with a free subscription to our annual newsletter.</p>';
						echo $error.$content;
						}
					else
						{
						echo '<p class="error">There has been a problem loading this page.<br />Please <a href="buckeye-career-center-alumni.php" style="color:#e83024;">try again.</p>';
						}
					?>
				
				<div class="clear"></div>
				<?php include('inc/contact.php'); ?>
			</div>
			<div class="sidebar">
				<?php include('inc/sidebar-slides.php'); ?>
			</div>
		</div>
	</div>
	<?php include('inc/foot.php'); ?>
</body>
</html>