<?php
session_start();
$host='127.0.0.1'; $db='homco'; $user='root'; $pass='';
try { $pdo=new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4",$user,$pass,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); }
catch(PDOException $e){ die('Database connection failed. Import database.sql first.'); }
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function isLogin(){return isset($_SESSION['user']);}
function requireLogin(){if(!isLogin()){header('Location: ../auth/login.php');exit;}}
function requireAdmin(){requireLogin(); if($_SESSION['user']['role']!=='admin'){header('Location: ../user/dashboard.php');exit;}}
?>
