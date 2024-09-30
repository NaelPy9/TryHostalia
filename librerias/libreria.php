<?php
    function redireccion($ruta) {
        exit(header("Location: {$ruta}"));
    }