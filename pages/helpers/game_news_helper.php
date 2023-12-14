<?php
  function get_latest_news($app_id) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, 'https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid='. $app_id . '&count=5&maxlength=500&format=json');
    $output = curl_exec($ch);
    curl_close($ch);
  
    $articles = json_decode($output, true)["appnews"]["newsitems"];
    return $articles;
  }
?>