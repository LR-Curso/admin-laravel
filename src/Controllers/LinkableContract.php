<?php namespace Lrcurso\Admin\Controllers;


use Illuminate\Http\Response;

interface LinkableContract
{
    public static function showInSidebar(): bool;
    public static function getDescription(): string;
    public static function getTitle(): string;
    public static function getIconClass(): string;

    public function index():Response;

}