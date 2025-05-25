<?php

return [
  'minecraft' => [
    'usernameUrl' => 'https://api.mojang.com/users/profiles/minecraft/',
    'idUrl'=> 'https://sessionserver.mojang.com/session/minecraft/profile/',
  ],
  'steam' => [
    'idUrl' => 'https://ident.tebex.io/usernameservices/4/username/',
  ],
  'xbl' => [
    'usernameUrl' => 'https://ident.tebex.io/usernameservices/3/username/%s?type=username',
    'idUrl' => 'https://ident.tebex.io/usernameservices/3/username/'
  ]
];