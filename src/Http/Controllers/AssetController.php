<?php

namespace SebastianJung\Vault423\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AssetController extends Controller
{
    public function img($imgname) {
        $content = file_get_contents(__DIR__ . '/../../resources/img/' . $imgname);

        $response = new Response(
            $content,
            200,
            [
                'Content-Type' => 'image/svg+xml',
            ]
        );

        return $response;
    }

    public function fonts($fontname) {
        $content = file_get_contents(__DIR__ . '/../../dist/fonts/' . $fontname);

        $response = new Response(
            $content,
            200,
            [
                'Content-Type' => 'text/plain',
            ]
        );

        return $response;
    }

    public function css()
    {
        $content = file_get_contents(__DIR__ . '/../../dist/vault-423.css');

        $response = new Response(
            $content,
            200,
            [
                'Content-Type' => 'text/css',
            ]
        );

        return $response;
    }

    public function js()
    {
        $content = file_get_contents(__DIR__.'/../../dist/vault-423.js');

        $response = new Response(
            $content, 200, [
                'Content-Type' => 'text/javascript',
            ]
        );

        return $response;
    }
}
