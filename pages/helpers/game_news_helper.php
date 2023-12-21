<?php
  // Helper function that fetches the latest news for a game
  function get_latest_news($app_id) {
    $ch = curl_init();
    // Using curl to query the steam API endpoint for news with a given AppID
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, 'https://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid='. $app_id . '&count=5&maxlength=500&format=json');
    $output = curl_exec($ch);
    curl_close($ch);
  
    // Convert response to JSON and extract news payload.
    $articles = json_decode($output, true)["appnews"]["newsitems"];
    return $articles;
  }
?>