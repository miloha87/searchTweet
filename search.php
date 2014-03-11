<<?php
    require 'app_tokens.php';
    require 'tmhOAuth-master/tmhOAuth.php';
    
    include 'web/php/insert.php';
   
    $query = htmlspecialchars($_GET['query']);
    
    if (empty($query))
    {
        $query = "Alejita";

    }
    
    $connection = new tmhOAuth(array(
        'consumer_key' => $consumer_key,
        'consumer_secret' => $consumer_secret,
        'user_token' => $user_token,
        'user_secret' => $user_secret

    ));
    
    $http_code = $connection->request('GET',
                                      $connection->url('1.1/search/tweets'),
                                      array('q' => $query, 'count' => 10, 'lang' => 'en')
                                     );

    if ($http_code == 200)
    {
        $response = json_decode($connection->response['response'],true);
        $tweet_data = $response['statuses'];

        $tweet_stream = '[';
        
        foreach ($tweet_data as $tweet)
        {
            $tweet_stream .= ' { "tweet": ' . json_encode($tweet['text']) . ' },';
        }
        
        $tweet_stream = substr($tweet_stream, 0, -1);
        $tweet_stream .= ']';

        echo $tweet_stream;
    }
    else
    {
        if ($http_code == 429)
        {
            echo 'Error: La api de Twitter llego a su limite';
        }
        else
        {
            echo  'Error: No es posible procesar su solicitud';
        }
    }
?>
