<?php namespace Lrcurso\Admin\Controllers;


trait LinkableTrait
{
    protected static $show_in_sidebar = true;

    protected  static $description = null;

    protected static $title = null;

    protected static $icon_class = "fa fa-cogs";

    public static function showInSidebar(): bool
    {
        return static::$show_in_sidebar;
    }
    public static function getDescription(): string
    {
        return static::$description ?? trans(class_basename(self::class).'::description');
    }
    public static function getTitle(): string
    {
        return static::$title ?? trans(class_basename(self::class).'::title');
    }
    public static function getIconClass(): string
    {
        return static::$icon_class;
    }
}