<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    
<link rel="stylesheet" href="<?php echo base_url('css/home.css'); ?>">
</head>
<body>
    <header>
        <div class="logo-area">
            <div class="logo-circle">
                <img src="<?= base_url('images/logo.png') ?>" alt="Logo" style="width: 100%;">
            </div>
            <span class="logo-text"><?= $brandName ?></span>
        </div>
        <nav>
            <a href="<?= site_url('home') ?>">Home</a> 
            <a href="<?= site_url('products') ?>">Products</a>
            <a href="<?= site_url('cart') ?>">Cart</a>
        </nav>
    </header>
