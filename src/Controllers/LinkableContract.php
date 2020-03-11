<?php

namespace Lrcurso\Admin\Controllers;

use Illuminate\View\View;

interface LinkableContract
{
    public static function showInSidebar(): bool;

    public static function getDescription(): string;

    public static function getTitle(): string;

    public static function getIconClass(): string;

    public static function getRoute(): string;

    public function index(): View;
}
