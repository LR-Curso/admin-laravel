<?php
/**
 * Created by PhpStorm.
 * User: leandro
 * Date: 27/08/16
 * Time: 15:35.
 */

namespace Lrcurso\Admin\Controllers;

use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Routing\ResponseFactory as Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin(Response $response)
    {
        return $response->view('lrcurso_admin::admin.auth.login', [
            'action' => route('admin.login.post'),
        ]);
    }

    public function postLogin(Request $request, Auth $auth)
    {
        $credentials = $request->only([
            env('USER_COLUMN_PASSWORD', 'password'),
            env('USER_COLUMN_LOGIN', 'email'),
        ]);
        $credentials['is_admin'] = true;

        if ($auth->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('/admin');
        } else {
            return redirect()->back()->withErrors([
                'login' => trans('lrcurso_admin::login.invalid'),
            ]);
        }
    }

    public function logout(Auth $auth)
    {
        $auth->logout();

        return redirect('\admin');
    }
}
