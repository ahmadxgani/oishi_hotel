<?php

if (!function_exists('toast')) {
    /**
     * Create a toast message.
     *
     * @param  string|null $message
     * @param  string      $level
     * @return \App\Services\Toaster
     */
    function toast($message = null, $level = 'information')
    {
        $toaster = app('toaster');
        if (!is_null($message)) {
            return $toaster->toast($message, $level);
        }

        return $toaster;
    }

}
