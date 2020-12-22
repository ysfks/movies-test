<?php

function view($file, $array = []) {
    \App\Core\View::render($file, $array);
}