<?php 
	echo password_hash("password", PASSWORD_DEFAULT). "\n";

	$hashedpw = '$2y$10$rxlE/fD5Y56oUt3dR7p5Qu3yxAXnYhlljUjtrmG85Bvx4n3c3tdXm';
	$pw = "password";

	if(password_verify($pw, $hashedpw)){
		echo "Success";
	} else {
		echo "fail";
	}

?>