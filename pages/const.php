<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$_REQUEST = array_merge($_COOKIE, $_REQUEST);
$type = [
    ["круиз", 2000, "На большом теплоходе и в белых штанах"], 
    ["сафари", 3000, "В жаркой пустыне с холодным пивом"],
    ["гастротур", 1000, "Умри от обжорства"]
];
$food = [
    ["завтрак", 10, "с 8-00 до 10-00"],
    ["ужин", 20, "с 19-00 до 22-00"],
    ["пансион", 50, "добавляется обед с 13-00 до 15-00"]
];
$country = [
    [["Италия", 200], ["Хорватия", 100], ["Швеция", 300]],
    [["Кения", 500], ["Марокко", 300], ["ЮАР", 800]],
    [["Дания", 50], ["Норвегия", 100], ["Франция", 80]]
];
$dop = array(
    "Развлечения" => [
        ["сауна", 50], ["бассейн", 100], ["бар", 200]
    ],
    "Экскурсии" => [
        ["кормление животных", 100], ["фотоохота",50],["разделывание туши",200]
    ],
    "Места" => [
        ["местный рынок", 50],["приготовление еды", 200],["виноферма",100]
    ]
);
$setType = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$setFood = isset($_REQUEST['food']) ? $_REQUEST['food'] : "";
$setCont = isset($_REQUEST['cont']) ? json_decode($_REQUEST['cont'], true) : [
    "name" => isset($_REQUEST['name']) ? $_REQUEST['name'] : "",
    "tel" => isset($_REQUEST['phone']) ? $_REQUEST['phone'] : "",
    "mail" => isset($_REQUEST['email']) ? $_REQUEST['email'] : ""
];
$setCountry = isset($_REQUEST['country']) ? $_REQUEST['country'] : "";
$setDop = 0;
if (isset($_REQUEST['dop'])){
  if (is_numeric($_REQUEST['dop']))
    $setDop = $_REQUEST['dop'];
  else
  $setDop = array_reduce($_REQUEST['dop'], function($full, $itm) {
    $full |= (int)$itm;
    return $full;
}, 0);
}
$setDay = isset($_REQUEST['day']) ? $_REQUEST['day'] : "";
$key = isset($_REQUEST['dopKey']) ? $_REQUEST['dopKey'] : "";
if (isset($_REQUEST["login"], $_REQUEST["password"])
    && $_REQUEST['login'] == "admin" && $_REQUEST['password'] == "123") {
    setcookie('login', $_REQUEST["login"], time() + 600);
    setcookie('password', $_REQUEST["password"], time() + 600);
}
if (isset($_REQUEST['type'])) {
    setcookie('type', $_REQUEST["type"], time() + 600);
    setcookie('food', $_REQUEST["food"], time() + 600);
    setcookie('cont', json_encode($setCont), time() + 600);
}
if (isset($_REQUEST["country"])){
    setcookie('country', $_REQUEST["country"], time() + 600);
    setcookie('dop', $setDop, time() + 600);
    setcookie('day', $_REQUEST['day'], time() + 600);
    setcookie('dopKey', $_REQUEST['dopKey'], time() + 600);
}