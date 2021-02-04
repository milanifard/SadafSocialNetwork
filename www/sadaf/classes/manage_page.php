<?php

class manage_page
{
    public static function get_page_url($url, $query, $page) {
        $page_url = $url;
        $query['page'] = $page;
        $query_result = http_build_query($query);
        $page_url .= '?'.$query_result;
        return $page_url;
    }
}