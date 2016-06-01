<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Url\Shortner\Facades\Little;
use Illuminate\Support\Facades\Redirect as Redirect;
use Url\Validation\ValidationException;
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
             return Redirect::home()->withErrors($e->getErrors())->withInput();
        }
        return Redirect::home()->with([
            'flash_message' => 'Here you go!' . link_to($hash),
            'hashed' => $hash
        ]);
    }

    public function translateHash($hash)
    {
        try {
            $url = Little::geturlbyHash($hash);
            return Redirect::to('http://' . $url);
        }
        catch (NonExistentHashException $e)
        {
            return Redirect::home()->withFlashmessage('Sorry'); 
        } 
    }
}
