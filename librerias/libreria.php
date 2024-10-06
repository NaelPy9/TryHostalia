<?php
    function redireccion($url) {
        exit(header("Location:". $url));
    }