<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Url\Shortner\Facades\Little;
use Url\Validation\ValidationException;
use Url\Exceptions\NonExistentHashException;
class LinksController extends Controller
{
    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        try 
        {
            $hash = Little::make(\Input::get('url'));

        }
        catch (ValidationException $e)
        {
             return \Redirect::home()->withErrors($e->getErrors())->withInput();
        }
        return \Redirect::home()->with([
            'flash_message' => 'Here you go!' . link_to($hash),
            'hashed' => $hash
        ]);
    }

    public function translateHash($hash)
    {
        try {
            $url = Little::geturlbyHash($hash);
            return \Redirect::to($url);
        }
        catch (NonExistentHashException $e)
        {
            return \Redirect::home()->with('Message', 'No Sorry');
        } 
    }
}
