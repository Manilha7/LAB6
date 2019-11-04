
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
                <li><a href="{$href1}">{$MENU_1}</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{$href2}">{$MENU_2}</a></li>
                <li><a href="{$href3}">{$MENU_3}</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="https://images.wallpaperscraft.com/image/new_york_night_skyscrapers_top_view_59532_1280x720.jpg" alt="Image2">
            <div class="carousel-caption">
                <h3>New York</h3>
            </div>
        </div>

        <div class="item">
            <img src="https://images.wallpaperscraft.com/image/dubai_burj_al_arab_palm_trees_deck_chairs_beach_111660_1280x720.jpg" alt="Image">
            <div class="carousel-caption">
                <h3>Dubai</h3>

            </div>
        </div>
        <div class="item">
            <img src="https://images.wallpaperscraft.com/image/paris_france_louvre_59233_1280x720.jpg" alt="Image3">
            <div class="carousel-caption">
                <h3>Paris</h3>

            </div>
        </div>
    </div>


    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container text-center">
    <h2>Viagens</h2><br>
</div>
<!-- Left-aligned media object -->

<div class="container">
    {foreach item=base from=$baseLab4}
    <div class="media">
        <div class="media-left">
            <img src="https://www.w3schools.com/bootstrap/img_avatar3.png" class="media-object" style="width:60px">
        </div>
        <div class="media-body">
            <h4 class="media-heading">{$base.name} <small><i> Data de modificação: {$base.updated_at}  </i></small></h4>
            <p> {$base.content}</p>
            <div class="text-right">
                <h4><small><i> Data de criação:  {$base.created_at}</i></small></h4>
         </div>
         {if $base.user_id eq $userId}
         <a href="blog.php?micropost_id=$base.id" role="button" class="btn btn-warning">Update</a>
         {/if}
   	</div>
</div>

    <hr>
    {/foreach}

    <!-- Right-aligned media object -->

<footer class="container-black">
    <div class="text-left">
        <p><h6>Desenvolvimento de Aplcações Web</h6></p>
    </div>
    <div class="text-right">
        <p><h6>Design by David Fernandes</h6></p>
    </div>
</footer>

</body>
</html>
