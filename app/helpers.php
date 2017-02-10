<?php

if (! function_exists('gravatar')) {
    /**
     * Return a gravatar link for given email.
     *
     * @param  string $email
     * @param  int    $size
     * @return string
     */
    function gravatar($email = '', $size = 30)
    {
        $email = md5($email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}&d=mm";
    }
}
