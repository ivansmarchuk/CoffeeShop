<?php

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS .'/functions.php';


new \coffeeshop\App();

throw new Exception('page not found', 505);