<?php

require "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

class tweet_API{
	private $connection;

	//twitter app specific keys
    //create your application specif keys from here https://dev.twitter.com/
	private $access_token="2178453440-JhyL2Kl1J1iVrMreXrB3ErKCJBo1wEEkHU1M3bE";
	private $access_token_secret="yFFWz1hxUIT1HcvP5BCKTtFMv29ned7OPFWVN7r2CaU3U";
	private $consumer_key="3lkpgBu2NswbGDKB70RT8A";
	private $consumer_secret="IX622y1IGpFz5WBZ2Sp8cwfrsQvUPM5qvszKjBmTk";

	//class constructor
	public function tweet_API() {
		$this->connection = new TwitterOAuth($this->consumer_key,$this->consumer_secret,$this->access_token,$this->access_token_secret);
		$this->connection->setTimeouts(10, 25);
	}

	public function search_by_hashtag($tag)
	{
		$query = array(
		  "q" => $tag,
		  "result_type" => "popular",
		  "count" => "100"
		);
		
		$data = $this->connection->get('search/tweets', $query);
		$tweets=array();
		foreach ($data->statuses as $result) {
			if($result->retweet_count > 0){
				$tweets[]=array("user_name"=>$result->user->screen_name,"text"=>$result->text,"retweets"=>$result->retweet_count);
			}
		}
		return $tweets;
	}
}