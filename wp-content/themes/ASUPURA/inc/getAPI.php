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

/**
* Class name: API
* Requess API from asupura.com
*
* @author Creater: Nghi Ho <nghi_hq@vietvang.net>
* @author Updater: Nghi Ho <nghi_hq@vietvang.net>
* 
* Last update: 2016-01-21
*/
class API
{
	// const ASUPURA_URL = "https://asupura.com/api/";
	const ASUPURA_URL = "http://test.dev/";
	const TIMEOUT = "30";

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
	private static function process($url, $method = "GET", $data = false)
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

		$response = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

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
	* Function: getProcess
	* Create get request to asupura server
	*
	* @param string $api API name
	* @param array $param parameters for the request
	* @return array of result. If there is error, the result is array('errorCode' => <error code>, 'description' => <error description>)
	* @access private
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
				$paramStr = empty($paramStr)? "{$key}={$value}" : "&{$key}={$value}";
			}
		}

		$url .= "?{$paramStr}";

		return self::process($url);
	}

	/**
	* Function: postProcess
	* Create post request to asupura server
	*
	* @param string $api API name
	* @param array $param parameters for the request
	* @return array of result. If there is error, the result is array('errorCode' => <error code>, 'description' => <error description>)
	* @access private
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

		return self::process($url, "POST", $param);
	}
}