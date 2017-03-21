<?php

require_once (__DIR__."/src/Main.php");
use lib\Magic\Storage;
use lib\Magic\Transfer;
use lib\Magic\User;
use Magic\LibHelperOne;


$help =new LibHelper();
$helpOne =new LibHelperOne();
$user =new User("Jonas","jonas@email.com","Katukas");
$user2 = clone($user);
echo "User2 email. ".$user2->email."<br>";
unset($user2->email);
echo "User2  check email.".
isset($user2->email);
$user2->email = "Bong@bong.com";

$storage = new Storage();
$serUser = serialize($user);
$newuser = unserialize($serUser);
$storage($newuser);
$storage($user2);

echo "<br> Setting properties:";
$user2->name = "Pablo";
$user2->email = "Ang";
echo $storage;

echo "<br>";
var_dump($storage);
echo "<br>";

echo "<br> Export data: ";
$storageCopy = var_export($storage::getUser(), true);
print($storageCopy);
echo "<br>";

$storage->erase();
$storage::erase();

echo $storage;


echo $user->name."<br>";
echo $user->email."<br>";
echo isset($user->email)."<br>";
unset($user->email);
echo isset($user->email)."<br>";


echo $storage;
