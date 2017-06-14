<!DOCTYPE html>
<html>
<?php
	require_once('twitter.php');
	$client=new tweet_API();
    $hashtag="#custserv";
	$tweets=$client->search_by_hashtag($hashtag);
?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <title>Tweets</title>
    </head>

    <body>
        <div>
            <div class="container">
                <h1>Showing Tweets with Hashtag "#custserv" </h1> </div>
            <div class="container">
                <div id="wrapper">
                    <div id="columns">
                        <?php
				foreach($tweets as $tweet){   ?>
                            <div class="pin">
                                <p>
                                    <?php echo $tweet["text"];?>
                                </p>
                                <br>
                                <p>
                                    <?php echo "<strong> NO. OF RETWEETS : ".$tweet["retweets"];?> </p>
                                <p>
                                    <?php echo "<strong>  USER : ". $tweet["user_name"];?> </p>
                            </div>
                            <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>