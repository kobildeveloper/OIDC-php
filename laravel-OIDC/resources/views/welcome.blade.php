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
					<img src="<?php echo asset('images/logo.png')?>" alt="mIDentity One"/>
				</div>
                <div class="card-title">mIDentity One</div>
				<h4>Plain PHP - Authorization flow authentication</h4>
                <div class="card-body">
                    <div class="btnbox">
						<a class="button" href="<?php echo config('app.UserAuthorizationUri') ?>?client_id=<?php echo config('app.ClientId') ?>&redirect_uri=http://127.0.0.1:8000/oidc/get/token&response_type=code&scope=<?php echo config('app.Scope') ?>">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Main End-->
        
    </body>
</html>
