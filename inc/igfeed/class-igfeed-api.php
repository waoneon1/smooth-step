<?php

// https://graph.instagram.com/me?fields=id,username,media&access_token=IGQVJWTHVLaFFyVGJ0cXZAqeEtzSjVnVmVBM0d3bDhvbnZALaEdjQkZAMX0VERURKWFFMekg1NkNDWnpSeVJBZAnZAZARXJmSmE1al9Ha0VJamNMUnlmVzRuUU1kcElnUnQwaG5YR0k5MHBabXI0d0JLQ2psSQZDZD

// https://graph.instagram.com/17926522060071170?fields=thumbnail_url, id,media_type,media_url,username,timestamp,permalink,children,caption&access_token=IGQVJWTHVLaFFyVGJ0cXZAqeEtzSjVnVmVBM0d3bDhvbnZALaEdjQkZAMX0VERURKWFFMekg1NkNDWnpSeVJBZAnZAZARXJmSmE1al9Ha0VJamNMUnlmVzRuUU1kcElnUnQwaG5YR0k5MHBabXI0d0JLQ2psSQZDZD

//IGQVJVVEo1YnhqMWJvODlfX291WEZAndndHVGhCNmtnb255T2E0REdDZATNGSEVsTWs5el84emM2UW84ZA3ZAtRnd6VklQOU1faTduUjFxN0puY0Q0VFhVTDdzY0M2YkhUb1JxbkdGMlZA4MG5lSUtfLTdYbQZDZD


/**
 * 
 */
class IGFeedAPI
{
	
	protected static $url;
    protected static $access_token;
    protected static $headers;
    protected static $limit;

    protected static $path;
    protected static $fields;

    protected static $responses;

    public static function init($path, $fields = '', $headers = array(), $limit = 50) {
        
    	self::$url 				= 'https://graph.instagram.com/';
        self::$access_token   	= get_field('access_token', 'option');

        self::$headers 	= $headers;
        self::$path 	= $path;
        self::$fields   = $fields;
        self::$limit    = $limit;
    }

	public static function get() {
		
		$full_url = self::$url 
        . self::$path 
        . '?fields=' . self::$fields 
        . '&access_token=' . self::$access_token
        . '&limit=' . self::$limit;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $full_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, self::$headers);

        self::$responses = curl_exec($curl);
        //$a = curl_exec($curl);

        curl_close($curl);
	}

	/**
     * @return mixed
     */
    public static function get_response() {
        return self::$responses;
    }

    /**
     * @return mixed
     */
    public static function get_response_assoc() {
        return json_decode(self::$responses, true);
    }
}


