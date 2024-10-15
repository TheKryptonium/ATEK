<?php

    function getFolder($directory) : string{
        $folders = explode(DIRECTORY_SEPARATOR, $directory);
        return $folders[count($folders)-1];
    }