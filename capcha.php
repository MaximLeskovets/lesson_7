<?php
require "function.php";
if (isGet()) {
    $name = $_GET['name'];
}
renderCapcha($name);