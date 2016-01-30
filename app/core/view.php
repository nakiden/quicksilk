<?php

    Class View
    {
        // render pages with content of views and defaut template
        function render($content_view, $default_view, $data = null)
        {
            require '/app/views/'.$default_view;
        }
    }