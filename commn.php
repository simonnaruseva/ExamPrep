<?php

use App\Http\ItemHttpHandler;
use App\Http\UserHttpHandler;
use App\Repository\Categories\CategoryRepository;
use App\Repository\Items\ItemRepository;
use App\Repository\UserRepository;
use App\Service\Categories\CategoryService;
use App\Service\Encryption\ArgonEncryptionService;
use App\Service\Items\ItemService;
use App\Service\UserService;
use Core\DataBinder;

use Core\Template;
use Database\PDODatabase;

session_start();
spl_autoload_register();

$template = new Template();
$dataBinder = new DataBinder();
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new PDODatabase($pdo);
$userRepository = new UserRepository($db, $dataBinder);
$categoryRepository = new CategoryRepository($db,$dataBinder);
$itemRepository = new ItemRepository($db,$dataBinder);
$encryptionService = new ArgonEncryptionService();
$userService = new UserService($userRepository, $encryptionService);
$categoryService = new CategoryService($categoryRepository);
$itemService = new ItemService($itemRepository,$userService);
$userHttpHandler = new UserHttpHandler($template, $dataBinder);
$itemHttpHandler = new ItemHttpHandler($template,$dataBinder,$itemService,$userService,$categoryService);
