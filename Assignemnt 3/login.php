<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php'; 

$fb = new Facebook\Facebook([
  'app_id' => '1123043511168814', // Replace {app-id} with your app id
  'app_secret' => 'd8025487f1629044fe7362791cc4ea1f',
  'default_graph_version' => 'v2.12',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://localhost/fb/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
