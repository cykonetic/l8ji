<?php

$show = $_REQUEST['info'] ?? 'php';

if ('xdebug' === $show) {
    xdebug_info();
} else {
    phpinfo();
}
