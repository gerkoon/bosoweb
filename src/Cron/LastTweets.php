<?php

namespace Cron;

require '../../vendor/themattharris/tmhoauth/tmhOAuth.php';

class LastTweets extends \tmhOAuth
{
    public function __construct($config = array()) {

        $this->config = array_merge(
            array(
                'consumer_key'    => 'C3BBCstDWAEg6JQucJyTw',
                'consumer_secret' => '2QWHdRc37xeZeSy1Rsv4rKt5VfB3utxDk3D23fG44g',
                'token'           => '89912579-uif8RWD8yedeSkaTPcEvksvVuWEzsyqXUuWyq47f1',
                'secret'          => 'NGwPWG2FHI9r2OX3Ep6VuObk2Ye0JhAO14o2VaGTHbpAV',
            ),
            $config
        );

        parent::__construct($this->config);
    }

    public function getLastTweetsByUsername($username, $count = 5)
    {
        $code= $this->request('GET', $this->url('1.1/statuses/user_timeline'),
            array('screen_name'=>$username,
                  'count'=> $count));

        if ($code == 200)
            return json_decode($this->response['response'], true);

        else
            throw new \Exception('Error retrieving last tweets, Code: '.$code. '\n' . $this->response['response']);
    }

    public function verifyCredentials()
    {
        $code = $this->user_request(array(
            'url' => $this->url('1.1/account/verify_credentials.json')
        ));

        return json_decode($this->response['response'], true);
    }
} 