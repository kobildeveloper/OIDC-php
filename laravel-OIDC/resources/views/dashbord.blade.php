<!doctype html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/png" href="<?php echo asset('images/logo.png')?>"/>
        <title>mIDentity One</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="user-scalable=no,initial-scale=1.0,maximum-scale=1.0" />
		
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link href="<?php echo asset('css/style.css')?>" rel="stylesheet">
        
    </head>
    <body>
    <!--Main Start-->
        <div class="main">
            <div class="card">
				<div class="logo">
					<img src="images/logo.png" alt="mIDentity One"/>
				</div>
                <div class="card-title">mIDentity One</div>
				<h4>PHP Laravel - Implicit flow authentication</h4>
                <div class="card-body">
                    <div class="btnbox">						 
						<a  class="button" href="http://127.0.0.1:8000/logout">Logout</a>						 
                    </div>
                   <?php //print_r($userInfo); ?>
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
					
                </div>
            </div>
        </div>
        <!--Main End-->
    </body>
</html>