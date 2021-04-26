<?php 
include('function.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
        <title>mIDentity Box</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="user-scalable=no,initial-scale=1.0,maximum-scale=1.0" />
		
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link href="stylesheet/style.css" rel="stylesheet">
        
    </head>
    <body>
    
    	<!--Main Start-->
        <div class="main">
            <div class="card">
				<div class="logo">
					<img src="images/logo.png" alt="mIDentity Box"/>
				</div>
                <div class="card-title">mIDentity Box</div>
				<h4>Plain PHP - Authorization flow authentication</h4>
                <div class="card-body">
                    <div class="btnbox">
						<?php if(isset($_SESSION['user_info'])){ ?>
							<a  class="button" href="<?php echo LandingUrl; ?>/logout.php">Logout</a>
						<?php }else{ ?>
							<a class="button" href="<?php echo UserAuthorizationUri; ?>?client_id=<?php echo ClientId ?>&redirect_uri=<?php echo LandingUrl."/"; ?>&response_type=code&scope=<?php echo Scope; ?>">Login</a>
						<?php } ?>
                    </div>
                   
						<?php
						if(isset($_SESSION['user_info'])){
							$userInfo=$_SESSION['user_info'];
							?>
							
							 	
						<div class="listbox">
							<ul>
								<li>
									<div class="list-label">Name :</div>
									<div class="list-text"><?php echo $userInfo['name'] ?></div>
								</li>
								<li>
									<div class="list-label">Email :</div>
									<div class="list-text"><?php echo $userInfo['email'] ?></div>
								</li>
							</ul>
						</div>
						<?php } ?>
                    
                </div>
            </div>
        </div>
        <!--Main End-->
        
    </body>
</html>
