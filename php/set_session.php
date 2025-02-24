<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["userEmail"] = $_GET["email"];
    $_SESSION["userName"] = $_GET["nama"];
    $_SESSION["userRole"] = $_GET["role"];
}