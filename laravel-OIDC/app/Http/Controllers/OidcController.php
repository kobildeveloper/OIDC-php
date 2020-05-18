<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OidcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$access_token=session('access_token');
		$userInfo=$this->getUserInfo($access_token);
		if(isset($userInfo['name']) && isset($userInfo['email'])){
			
			$data['userInfo']=$userInfo;
			return redirect('/dashbord');
		}else{
			return view('welcome');
		}
    }
	public function dashbord(){
		if(session('access_token')!=""){
			$access_token=session('access_token');
			$userInfo=$this->getUserInfo($access_token);
			if(isset($userInfo['name']) && isset($userInfo['email'])){
				
				$data['userInfo']=$userInfo;
				return view('dashbord',$data);
			}
			return redirect('/');
		}else{
			return redirect('/');
		}
	}
	public function OidcGetToken(){
		session(['access_token'=>'']);
		if(isset($_GET['code'])){
			$client = new \GuzzleHttp\Client(); 
			$response = $client->post(config('app.AccessTokenUri'), [
				'headers' => [
					'Content-Type'  => 'application/x-www-form-urlencoded'
				],     
				'form_params' => [
					'grant_type' => config('app.GrantTypes'),
					'client_id' => config('app.ClientId'), // Replace with Client ID
					'client_secret' => config('app.ClientSecret'), // Replace with client secret
					'redirect_uri' => "http://127.0.0.1:8000/oidc/get/token", //replace with your redirect_url
					'code' => $_GET['code'],
				]
			]);
		}
		if($response->getBody()){
			$tokenArray=json_decode($response->getBody(), true);
			$access_token=$tokenArray['access_token'];
			$refresh_token=$tokenArray['refresh_token'];
			session(['access_token'=>$access_token]);
			session(['refresh_token'=>$refresh_token]);
			
		}
		return redirect('/dashbord');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	function getUserInfo($access_token){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => config('app.UserInfoUri'),
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"authorization: Bearer $access_token",
			"cache-control: no-cache",
			"content-type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		$UserInfo="";
		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
			$UserInfo=json_decode($response, true);
		}
		return $UserInfo;
	}
	
	function logOut(){
		$access_token=session('access_token');
		$refresh_token=session('refresh_token');

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => config('app.LogoutUrl'),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => 'client_id='.config('app.ClientId').'&client_secret='.config('app.ClientSecret').'&refresh_token='.$refresh_token,
			CURLOPT_HTTPHEADER => array(
				"authorization: Bearer $access_token",
				"cache-control: no-cache",
				"content-type: application/x-www-form-urlencoded",
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		session(['access_token'=>'']);
		session(['refresh_token'=>'']);
		return redirect('/');
	}
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
