$( function() {
    $( "ul.droptrue" ).sortable({
        connectWith: "ul",
        stop: function (event, ui) {
            test();
        }
    });

    $( "#sortable1, #sortable2, #sortable3" ).disableSelection();

    $('a[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'top',
        html: true
    });
} );

function test() {
    let ul = $('ul#sortable3');
    let dailyList = [];
    ul.each((i) => {
        let movies = [];
        let dayIndex = $(ul[i]).data('index');
        let liTags = $(ul[i]).children('li.ui-sortable-handle');
        liTags.each((a) => {
            let movie = $(liTags[a]).find('span#title').text();
            if (movie !== '') {
                movies.push(movie);
            }
        });

        dailyList[dayIndex] = movies;
    });

    console.log(dailyList);
}

function search(el) {
    if (el.value.trim().length > 0) {
        $.post('index.php', {
            'search' : el.value
        },(data) => {
            listRender(data);
        }, 'json')
    }

    if (el.value.trim().length === 0) {
        $.post('index.php', {
            'listAll' : 1
        },(data) => {
            listRender(data);
        }, 'json')
    }
}

function filter(el) {
    if (el.value === '') {
        $.post('index.php', {
            'listAll' : 1
        },(data) => {
            listRender(data);
        }, 'json')
    } else {
        $.post('index.php', {
            'filter' : el.value
        },(data) => {
            listRender(data);
        }, 'json')
    }
}

function listRender(data) {
    let ul = $('div#all').find('ul');
    ul.empty();
    for(d in data) {
        console.log(d);
        ul.append('<li class="list-group-item"><span id="title">'+ data[d]['title'] +'</span> ('+ data[d]['imdbRating'] +' <i class="glyphicon glyphicon-star-empty"></i>)</li>');
    }
}