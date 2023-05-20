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
        foreach (static::getConstants() as $label => $value){
            $result[] = [
                'id' => $value,
                'label' => static::getDescription($value),
            ];
        }
        return $result;
    }
    private static function getConstants()
    {
        $reflectionClass = new ReflectionClass(__CLASS__);
        return $reflectionClass->getConstants();
}
    public static function getDescription($id)
    {
        switch ($id){
            case static::FRONT:
                return'Projets Frontend';
            case static::BACKEND:
                return'Projets Backend';
            case static::CMS:
                return'Projets CMS';
            case static::DESIGN:
                return'Projets Design';
        }
    }
}