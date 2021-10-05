<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function parliament(Request $request)
    {
        $return = 'GREAT BRITAIN. PARLIAMENT, ' . $request->year .'. ' . $request->title . 'London: HMSO.';
        return view('/')->with('success', $return);
    }

    public function apps(Request $request)
    {
        try {
            $return = strtoupper($request->developer)
                .'., '
                . $request->year
                .'. '
                . $request->title
                .' (version'
                . $request->version
                . ')[mobile app]. Available from:'
                . $request->url;

            return view('/')->with('success', $return);
        } catch (\Exception $exception)
        {
            return view('/')->with('danger', $exception);
        }
    }

    public function blogs(Request $request)
    {
        try {
            $return = strtoupper($request->author)
                .', '
                . $request->year
                .'. '
                . $request->title
                .' (version'
                . $request->version
                . ')[mobile app]. Available from:'
                . $request->url;

            return view('/')->with('success', $return);
        } catch (\Exception $exception)
        {
            return view('/')->with('danger', $exception);
        }
    }
}
