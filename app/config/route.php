<?php

/**
 * @author Bao
 */


use App\Controllers\IndexController;
use App\Controllers\StoreController;
use App\Controllers\MenuController;
use App\Controllers\ItemController;
use App\Controllers\UserController;
use \App\Controllers\DeviceController;
use \App\Controllers\GameController;



define('GET', 'GET');
define('POST', 'POST');

return [
    [GET, '/game', [GameController::class, 'index']],
    [GET, '/game/[*:id]', [GameController::class, 'rank']],

];
