<?php

namespace App\Helpers;

class FlashMessage
{
    public static function SetSuccessMessage($message): void
    {
        request()->session()->flash("message:success", $message);
    }

    public static function SetErrorMessage($message): void
    {
        request()->session()->flash("message:error", $message);
    }

    public static function SetInfoMessage($message): void
    {
        request()->session()->flash("message:info", $message);
    }
}
