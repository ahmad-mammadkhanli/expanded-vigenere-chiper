<?php

if (! function_exists("dd")) {
    function dd()
    {
        echo "<pre>";
        for ($i = 0; $i < func_num_args(); $i++) {
            print_r(func_get_args()[$i]);
        }
        echo "</pre>";

        die();
    }
}

?>