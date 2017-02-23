<?php
/**
* 
* 
* PHP version 5.5
*
* @author Creater: Nghi Ho <nghi_hq@vietvang.net>
* @author Updater: Nghi Ho <nghi_hq@vietvang.net>
* @version 1.0
* 
* File location:
*/

//Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
* Class name: API
* Requess API from asupura.com
*
* @author Creater: Nghi Ho <nghi_hq@vietvang.net>
* @author Updater: Nghi Ho <nghi_hq@vietvang.net>
* 
* Last update: 2016-02-15
*/
class API
{
	// const ASUPURA_URL = "http://vensera.xyz/api/";
	const ASUPURA_URL = "http://asupura.com/api/";
	const TIMEOUT = "30";
	const API_COOKIE = "api_cookies";

	/**
	* Function: process
	* Request to asupura server
	*
	* @param string $url API name
	* @param string $method GET or POST
	* @param array $data the data for post method
	* @return array of result. If there is error, the result is array('errorCode' => <error code>, 'description' => <error description>)
	* @access private
	* @static
	*/
	private static function process($url, $method = "GET", $data = false, $callback = false)
	{
		$ch = curl_init($url);

		if ($method == "POST") {
			curl_setopt($ch, CURLOPT_POST, true);
			if ($data) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, self::TIMEOUT);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		if ($callback) {
			curl_setopt($ch, CURLOPT_HEADERFUNCTION, 'API::getCookies');
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		} elseif (isset($_SESSION[self::API_COOKIE])) {
			$cookieStr = "";

			foreach ($_SESSION[self::API_COOKIE] as $key => $value) {
				if (!empty($cookieStr))
					$cookieStr .= ";{$key}={$value}";
				else {
					$cookieStr .= "{$key}={$value}";
				}
			}

			if ($cookieStr) {
				curl_setopt($ch, CURLOPT_COOKIE, $cookieStr);
			}
		}

		$response = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		return array("status" => $status, "response" => $response);
	}

	/**
	* Function: getResult
	* Convert api response to array
	*
	* @param string $status response status
	* @param string $response the response
	* @return array of result
	* @access private
	* @static
	*/
	private static function getResult($status, $response)
	{
		$result = array();
		switch ($status) {
			case '200':
			$result = json_decode($response, true);
			break;
			case '400':
			$result = array("errorCode" => 400, "description" =>  "Bad Request");
			break;
			case '401':
			$result = array("errorCode" => 401, "description" =>  "Unauthorized");
			break;
			case '404':
			$result = array("errorCode" => 404, "description" =>  "Not Found");
			break;
			case '500':
			$result = array("errorCode" => 500, "description" =>  "Internal Server Error");
			break;
			
			default:
			$result = array("errorCode" => 1, "description" =>  "Response status is {$status}");
			break;
		}

		return $result;
	}

	/**
	* Function: getCookies
	* Parse header and store cookies to system session variable
	*
	* @param string $ch curl object
	* @param string $str header string
	* @return int
	* @access private
	* @static
	*/
	private static function getCookies($ch, $str)
	{
		preg_match('/^Set-Cookie: ?(.*)$/i', $str, $match);
		if (!empty($match)) {
			$var = explode("=", explode(";", $match[1])[0]);
			$_SESSION[self::API_COOKIE][$var[0]] = $var[1];
		}
		return strlen($str);
	}

	/**
	* Function: getProcess
	* Create get request to asupura server
	*
	* @param string $api API name
	* @param array $param parameters for the request
	* @return array of result. If there is error, the result is array('errorCode' => <error code>, 'description' => <error description>)
	* @access public
	* @static
	*/
	public static function getProcess($api, $param = false)
	{
		$url = self::ASUPURA_URL . $api;
		$paramStr = "";
		if ($param) {
			if (!is_array($param)) {
				return array('errorCode' => 0, 'description' => "Parameter(s) must be an array");
			}
			
			foreach ($param as $key => $value) {
				$paramStr .= empty($paramStr)? "{$key}={$value}" : "&{$key}={$value}";
			}
		}

		$url .= "?{$paramStr}";
		$result = self::process($url);

		return self::getResult($result['status'], $result['response']);
	}

	/**
	* Function: postProcess
	* Create post request to asupura server
	*
	* @param string $api API name
	* @param array $param parameters for the request
	* @return array of result. If there is error, the result is array('errorCode' => <error code>, 'description' => <error description>)
	* @access public
	* @static
	*/
	public static function postProcess($api, $param = array())
	{
		$url = self::ASUPURA_URL . $api;
		if ($param) {
			if (!is_array($param)) {
				return array('errorCode' => 0, 'description' => "Parameter(s) must be an array");
			}
		}

		$result = self::process($url, "POST", $param);

		return self::getResult($result['status'], $result['response']);
	}

	/**
	* Function: login
	* Login to api system, get the session, token and store theme to $_SESSION
	*
	* @param string $userId
	* @param string $password
	* @return array of user's information if login success
	* @return boolean false in otherwise
	* @access public
	* @static
	*/
	public static function login($userId, $password)
	{
		$url = self::ASUPURA_URL . 'login';
		$param = array('user_id' => $userId, 'password' => $password);

		self::process($url, "POST", $param, true);

		if (isset($_SESSION[self::API_COOKIE]) and !empty($_SESSION[self::API_COOKIE])) {
			$user = self::getProcess('user.json');
			if (isset($user['user_id']) and isset($user['user_name'])) {
				return $user;
			}
		}

		//if unsuccessfully login, delete session variable and return false
		if (isset($_SESSION[self::API_COOKIE])) {
			unset($_SESSION[self::API_COOKIE]);
		}
		return false;
	}

	/**
	* Function: Logout
	* Send log out request and destroy session variable.
	*
	* @return null
	* @access public
	* @static
	*/
	public static function logout()
	{
		self::postProcess("logout");
		// unset($_SESSION[API::API_COOKIE]['token']);
		// unset($_SESSION[API::API_COOKIE]['laravel_session']);
		session_destroy();
		//$_SESSION['logged-out'] = '1';
		// if (isset($_SESSION[self::API_COOKIE])) {
		// 	$_SESSION = array();
		// 	unset($_SESSION[self::API_COOKIE]);
		// 	// If it's desired to kill the session, also delete the session cookie.
		// 	// Note: This will destroy the session, and not just the session data!
		// 	if (ini_get("session.use_cookies")) {
		// 	    $params = session_get_cookie_params();
		// 	    setcookie(session_name(), '', time() - 42000,
		// 	        $params["path"], $params["domain"],
		// 	        $params["secure"], $params["httponly"]
		// 	    );
		// 	}

		// 	// Finally, destroy the session.
		// 	session_destroy();
		// }
	}
}