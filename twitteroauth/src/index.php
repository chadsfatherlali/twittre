<?php
/**
 * Created by PhpStorm.
 * User: chadsfather
 * Date: 7/11/15
 * Time: 0:42
 */

include_once 'TwitterOAuth.php';

$consumer = 'UacUG3wWt4v7xFNtfMKR115Le';
$consumersecret = 'JQ7y8bxjRdvhodiNxViIL1YgZMj1jEORsQ7APhtYiLqUhojSlP';
$accestoken = '2320470469-0kTEEfX94A0V9r5rymxW4aljgyfprXfjLYwOkMf';
$accestokensecret = 'OOaRmHonSk6dhTCD5dOkCgKp4IH8EeDwsUUmLZdGBaJlZ';

$twitter = new TwitterOAuth($consumer, $consumersecret, $accestoken, $accestokensecret);

$result1 = $twitter->get(
    'statuses/home_timeline', array(
    'count' => 25,
    'exclude_replies' => true));

$result2 = $twitter->get('account/verify_credentials');

$img1 = $twitter->upload('media/upload', array(
    'media' => 'img1.jpg'
));
$img2 = $twitter->upload('media/upload', array(
   'media' => 'img2.gif'
));
$parameters = array(
    'status' => 'Learning #API twitter upload media',
    'media_ids' => implode(',', array(
        $img1->media_id_string,
        $img2->media_id_string
    )));
$result3 = $twitter->post('statuses/update', $parameters);

print('<pre>');
print_r($result3);
print('</pre>');

/*print('<pre>');
print_r($result1);
print('</pre>');
print('<hr />');
print('<hr />');
print('<pre>');
print_r($result2);
print('</pre>');*/
