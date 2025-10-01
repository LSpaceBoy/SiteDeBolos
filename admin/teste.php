<?php
echo (__DIR__);
$caminho =  __DIR__ . "/img/";
$pasta = str_pad(1 , 4, "0", STR_PAD_LEFT);
if (is_dir("$caminho/$pasta")) {
    mkdir("$caminho/$pasta");
}
