<?php
    namespace Cron;
    require_once __DIR__.'/../../vendor/autoload.php';
    //require('LastTweets.php');

    $lastTweets = new LastTweets();

    try
    {
        $result = $lastTweets->getLastTweetsByUsername('bosogroup');
        $s = '';
        foreach ($result as $item) {
            //handle any special characters
            $text = htmlentities($item['text'], ENT_QUOTES, 'utf-8');

            //build the metadata part
            //$meta = date('g:ia M jS', strtotime($item->created_at)) . ' from ' . $item->source;

            //parse the tweet text into html
            $text = preg_replace('@(https?://([-\w\.]+)+(/([\w/_\.]*(\?\S+)?(#\S+)?)?)?)@', '<a href="$1">$1</a>', $text);
            $text = preg_replace('/@(\w+)/', '<a href="http://twitter.com/$1">@$1</a>', $text);
            $text = preg_replace('/\s#(\w+)/', ' <a href="http://search.twitter.com/search?q=%23$1">#$1</a>', $text);

            //assemble everything
            $s .= '<div class="tweet">';
            $s .= "<img src='" . $item['user']['profile_image_url'] . "'/>'";
            $s .= "<a href='http://twitter.com/socialblabla' class='via'>@".$item['user']['screen_name']."</a>";
            $s .= "<p>" . $text . "</p>" . "</div>";
        }
        $htmlFile = __DIR__.'/../../cache/twig/twitter.html';
        if (!file_exists($htmlFile))
        {
            $f = fopen($htmlFile, 'w');
            fclose($f);
        }
        file_put_contents($htmlFile, $s);
    }
    catch (\Exception $e)
    {
        echo 'Error'. $e->getMessage();
    }