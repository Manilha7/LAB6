<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .carousel-inner img {
            width: 50%; /* Set width to 100% */
            margin: auto;
            min-height:100px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 200px) {
            .carousel-caption {
                display: none;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

            <a class="navbar-brand" href="#">City Forum</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">{$MENU_1}</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.php">{$MENU_2}</a></li>
                <li><a href="login.php">{$MENU_3}</a></li>
            </ul>
        </div>
    </div>
</nav>
<div>
 {if isset($MESSAGE) }
    <div class="alert alert-danger">
        <p style="text-align: center">{$MESSAGE}</p>
    </div>
    {/if}
</div>
<form method="POST" action="login_action.php">
<div class="container text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-center">
            <h1>Login</h1>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password-confirmed" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            <br>
            <hr>
            <button style="float: bottom" type="submit" class="btn btn-warning">GO</button>
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>
</form>
</body>
</html>