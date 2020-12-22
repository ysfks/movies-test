$( function() {
    $( "ul.droptrue" ).sortable({
        connectWith: "ul"
    });

    $( "#sortable1, #sortable2, #sortable3" ).disableSelection();

    let ul = $('div#all').find('ul');
} );


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

function listRender(data) {
    let ul = $('div#all').find('ul');
    ul.empty();
    data.forEach((d) => {
        ul.append('<li class="list-group-item">'+ d.title +'('+ d.imdbRating +' <i class="glyphicon glyphicon-star-empty"></i>)</li>');
    });
}