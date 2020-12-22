
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>

<body>

<div class="container">
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item active">All Movies</li>
            <?php foreach($allMovies as $movie): ?>
                <li class="list-group-item">
                    <?php echo $movie['title']; ?>
                    (<?php echo $movie['imdbRating']; ?> <i class="glyphicon glyphicon-star-empty"></i>)
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item active">Recommended Movies</li>
            <?php foreach($recommendedMovies as $recommended): ?>
                <li class="list-group-item">
                    <?php echo $recommended['title']; ?>
                    (<?php echo $recommended['imdbRating']; ?> <i class="glyphicon glyphicon-star-empty"></i>)
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-6">
        Days
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>
