<?php

include_once ('db/models.php');


?>
<!doctype html>
<html lang="en">
  <head>
    <style type="text/css">
        img {
            max-width: 100%;
            max-height: 240px;
        }

        /*.card {
            box-shadow: 1px 1px 3px rgba(170, 170, 170, 0.4);
            border-radius: 10px;
            padding: 10px;
            width: 100%;
        }

        .card:hover {
            box-shadow: 1px 1px 10px rgba(170, 170, 170, 0.4);
        }*/
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <header class="mb-1">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="#" class="navbar-brand">Brand</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="/ecom/" class="nav-item nav-link">Home</a>
                    <a href="/ecom/categories.php" class="nav-item nav-link">Categories</a>
                    <a href="/ecom/admin/" class="nav-item nav-link">Admin</a>
                    <a href="/ecom/cart/" class="nav-item nav-link">Cart</a>
                </div>
                <h3 class="badge badge-primary" id="cart-count"></h3>
            </div>
        </nav>
    </header>