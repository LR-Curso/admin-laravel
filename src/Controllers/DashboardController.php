<?php
/**
 * Created by PhpStorm.
 * User: leandro
 * Date: 29/08/16
 * Time: 12:30
 */

namespace Lrcurso\Admin\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        return view('lrcurso_admin::admin.dashboard');
    }
}