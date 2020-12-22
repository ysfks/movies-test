<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>

<div class="container-fluid">
    <div class="page-header">
        <h1>Movies</h1>
        <p class="lead">Drag & Drop System</p>
    </div>
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Search By Title</span>
            <input onkeyup="search(this)" type="text" class="form-control" placeholder="Title" aria-describedby="basic-addon1"/>
        </div>
    </div>
    <div class="col-md-3">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab"
                                                      data-toggle="tab">All</a></li>
            <li role="presentation"><a href="#recommended" aria-controls="recommended" role="tab" data-toggle="tab">Recommended</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="all">
                <ul id="sortable1" class="list-group droptrue">
                    <?php foreach ($allMovies as $movie): ?>
                        <li class="list-group-item">
                            <?php echo $movie['title']; ?>
                            (<?php echo $movie['imdbRating']; ?> <i class="glyphicon glyphicon-star-empty"></i>)
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="recommended">
                <ul id="sortable2" class="list-group droptrue">
                    <?php foreach ($recommendedMovies as $recommended): ?>
                        <li class="list-group-item">
                            <?php echo $recommended['title']; ?>
                            (<?php echo $recommended['imdbRating']; ?> <i class="glyphicon glyphicon-star-empty"></i>)
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-md-9">
        <div class="container">
            <div class="col-md-2">
                <h4>Monday</h4>
                <ul id="sortable3" class="list-group droptrue">
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="col-md-1">
                <h4>Tuesday</h4>
                <ul id="sortable3" class="list-group droptrue">
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h4>Wednesday</h4>
                <ul id="sortable3" class="list-group droptrue">
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="col-md-1">
                <h4>Thursday</h4>
                <ul id="sortable3" class="list-group droptrue">
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h4>Friday</h4>
                <ul id="sortable3" class="list-group droptrue">
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="col-md-1">
                <h4>Saturday</h4>
                <ul id="sortable3" class="list-group droptrue">
                    <li class="list-group-item"></li>
                </ul>
            </div>
            <div class="col-md-1">
                <h4>Sunday</h4>
                <ul id="sortable3" class="list-group droptrue">
                    <li class="list-group-item"></li>
                </ul>
            </div>
        </div>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="./assets/js/app.js"></script>
</body>
</html>
