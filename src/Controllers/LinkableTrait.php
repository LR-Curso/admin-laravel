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
        if (method_exists(static::class, 'hasPermission')) {
            return static::hasPermission();
        }

        return true;
    }

    /**
     * @return string
     */
    public static function getDescription(): string
    {
        if (property_exists(static::class, 'description')) {
            return static::$description;
        }

        return trans(class_basename(static::class).'::description');
    }

    /**
     * @return string
     */
    public static function getTitle(): string
    {
        if (property_exists(static::class, 'title')) {
            return static::$title;
        }

        return trans(snake_case(class_basename(static::class).'.title'));
    }

    /**
     * @return string
     */
    public static function getIconClass(): string
    {
        if (property_exists(static::class, 'icon_class')) {
            return static::$icon_class;
        }

        return 'fa fa-cogs';
    }

    /**
     * @return string
     */
    public static function getRoute(): string
    {
        if (property_exists(static::class, 'route')) {
            return static::$route;
        }

        return Str::slug(Str::snake(class_basename(static::class)));
    }
}
