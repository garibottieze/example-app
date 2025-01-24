<?php

if (! function_exists('pct_between')) {
    function pct_between(string $value): string
    {
        return chr(37).$value.chr(37);
    }
}
