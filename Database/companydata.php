<?php
	$cname = $_POST['name'];
	$addr = $_POST['addr'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$fname = $_POST['fname'];
	$lname = $_POST["lname"];
	$desg = $_POST["desig"];
	$contact = $_POST['contact'];
	$pemail = $_POST['pemail'];
	$loginid = $_POST['loginid'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$industry = $_POST['type'];
	$flag = 0;
	
	
	$db = pg_connect ("host=localhost dbname=job port=5432 user=postgres password=friends@2004") or die("not connected");
	echo "Connected To Database<br>";
	
	$qr="select * from company_reg";
	$rs=pg_query($qr) or die("Cannot execute query");
		
		while($row=pg_fetch_row($rs))
		{	
			if($cname==$row[0] && $city==$row[4] )
			{
				echo "Record Already Exist<br>";				
				echo "<a href='StudentRegistration.html'>Back</a>";
				$flag++;
			}	
		}
	
		if($flag==0)
		{
			$q="insert into company_reg(company_name,industry_type,company_addr,city,state,pincode,per_firstname,per_lastname,per_designation,contact_no,email_id,login_id,choose_password,conf_password) values('$cname','$type','$addr','$city','$state','$pincode','$fname','$lname','$desg','$contact','$pemail','$loginid','$password1','$password2')";
			$rs=pg_query($q) or die("Cannot execute query");
			//echo "Registration Done Successfull!!";
			echo "<script>alert('Registration Done Successfully!!')</script>";
			echo "<script> window.location.assign('Homepage.html'); </script>";
		}
		pg_close($db);
?>




