<?php

namespace App\Enums;

use ReflectionClass;

class Category
{
    const FRONT = 1;
    const BACKEND = 2;
    const CMS = 3;
    const DESIGN = 4;

    public static function getList()
    {
        $result = [];
        foreach (static::getConstants() as $label => $value) {
            $result[] = [
                'id' => $value,
                'label' => static::getDescription($value),
            ];
        }
        return $result;
    }

    private static function getConstants()
    {
        $reflection = new ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }

    public static function getDescription($id)
    {
        switch ($id) {
            case static::FRONT:
                return 'Projets front';
            case static::BACKEND:
                return 'Projet backend';
            case static::CMS:
                return 'Projet CMS';
            case static::DESIGN:
                return 'Projet design';
        }
    }
}