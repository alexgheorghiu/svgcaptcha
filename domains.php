<?php

function get_domains() {
    $domains = array();
    $lines = file('http://scriptoid.com/domains/domains.txt');
    foreach ($lines as $line) {
        if ($line[0] == '#') {
            continue;
        }
        list($domain, $anchor) = explode('~', trim($line));
        $domains[$domain] = $anchor;
    }
    
    return $domains;
}


function print_domains(){
    $domains = get_domains();

    $links = array();
    foreach ($domains as $domain => $anchor){
        $link = sprintf('<a href="http://%s">%s</a>', $domain, $anchor);
        $links[] = $link;
    }

    print(implode(' | ', $links));
}

?>
