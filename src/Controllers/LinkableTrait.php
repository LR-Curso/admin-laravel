<?php

namespace Lrcurso\Admin\Controllers;

/**
 * Trait LinkableTrait.
 */
trait LinkableTrait
{
    /**
     * @return bool
     */
    public static function showInSidebar(): bool
    {
        if (method_exists(self::class, 'hasPermission')) {
            return self::hasPermission();
        }

        return true;
    }

    /**
     * @return string
     */
    public static function getDescription(): string
    {
        if (property_exists(self::class, 'description')) {
            return self::$description;
        }

        return trans(class_basename(self::class).'::description');
    }

    /**
     * @return string
     */
    public static function getTitle(): string
    {
        if (property_exists(self::class, 'title')) {
            return self::$title;
        }

        return trans(snake_case(class_basename(self::class).'.title'));
    }

    /**
     * @return string
     */
    public static function getIconClass(): string
    {
        if (property_exists(self::class, 'icon_class')) {
            return self::$icon_class;
        }

        return 'fa fa-cogs';
    }

    /**
     * @return string
     */
    public static function getRoute(): string
    {
        if (property_exists(self::class, 'route')) {
            return self::$route;
        }

        return str_slug(snake_case(class_basename(self::class)));
    }
}
