<?php

function url()
{
    $current_path = parse_url('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $path = array_filter(explode('/',$current_path['path']));
    
    if (isset($path[1]))
    {  
        
        $url = $path[1];
    }
    
    return $url;
}


