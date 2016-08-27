<?php
/**
 * Created by PhpStorm.
 * User: leandro
 * Date: 27/08/16
 * Time: 15:35
 */

namespace Lrcurso\Admin\Controllers;


use Illuminate\Contracts\Routing\ResponseFactory as Response;

class AuthController extends Controller
{
    public function getLogin(Response $response)
    {
        return $response->view("lrcurso_admin::admin.auth.login");
    }
}