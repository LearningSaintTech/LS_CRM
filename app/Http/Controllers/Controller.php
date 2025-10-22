<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // Small helper alert methods used by several controllers.
    // These simply add a flash message to the session so views can display them.
    protected static function alertSuccess(string $message = 'Operation completed successfully.')
    {
        if (function_exists('session')) {
            session()->flash('success', $message);
        }
    }

    protected static function alertupdate(string $message = 'Record updated successfully.')
    {
        if (function_exists('session')) {
            session()->flash('success', $message);
        }
    }

    protected static function alerterror(string $message = 'An error occurred.')
    {
        if (function_exists('session')) {
            session()->flash('error', $message);
        }
    }

    protected static function errordelete(string $message = 'Cannot delete record.')
    {
        if (function_exists('session')) {
            session()->flash('error', $message);
        }
    }

    protected static function alertdelete(string $message = 'Record deleted successfully.')
    {
        if (function_exists('session')) {
            session()->flash('success', $message);
        }
    }
}
