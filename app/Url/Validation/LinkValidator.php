<?php namespace Url\Validation;


class LinkValidator extends Validator
 {
    protected static $rules = [
        'url' => 'required|url|unique:Links,url',
        'hash' => 'required|unique:Links,hash'
    ];
}
