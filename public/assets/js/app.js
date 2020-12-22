$( function() {
    $( "ul.droptrue" ).sortable({
        connectWith: "ul",
        stop: function (event, ui) {
            updateDailyWatchList();
        }
    });

    $( "#sortable1, #sortable2, #sortable3" ).disableSelection();

    initTooltip();
} );

function initTooltip() {
    $('a[data-toggle="tooltip"]').each((i) => {
        let tooltip = $('a[data-toggle="tooltip"]')[i];
        $(tooltip).tooltip({
            animated: 'fade',
            placement: 'top',
            html: true,
            content: $(tooltip).attr('title')
        });
    });
}

function updateDailyWatchList() {
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

    $.post('index.php', {
        'update-watch-list' : dailyList
    },() => {}, 'json')
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
        ul.append('<li class="list-group-item">' +
            '<a data-toggle="tooltip" title=\'<img src="' + data[d]['posterUrl'] + '" />\'>' +
            '<span id="title">'+ data[d]['title'] +'</span>' +
            '('+ data[d]['imdbRating'] +' <i class="glyphicon glyphicon-star-empty"></i>)' +
            '</a>' +
            '</li>');
    }

    initTooltip();
}