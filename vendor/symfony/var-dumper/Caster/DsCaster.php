<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20210710\Symfony\Component\VarDumper\Caster;

use Ds\Collection;
use Ds\Map;
use Ds\Pair;
use MonorepoBuilder20210710\Symfony\Component\VarDumper\Cloner\Stub;
/**
 * Casts Ds extension classes to array representation.
 *
 * @author Jáchym Toušek <enumag@gmail.com>
 *
 * @final
 */
class DsCaster
{
    public static function castCollection(\Ds\Collection $c, array $a, \MonorepoBuilder20210710\Symfony\Component\VarDumper\Cloner\Stub $stub, bool $isNested) : array
    {
        $a[\MonorepoBuilder20210710\Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL . 'count'] = $c->count();
        $a[\MonorepoBuilder20210710\Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL . 'capacity'] = $c->capacity();
        if (!$c instanceof \Ds\Map) {
            $a += $c->toArray();
        }
        return $a;
    }
    public static function castMap(\Ds\Map $c, array $a, \MonorepoBuilder20210710\Symfony\Component\VarDumper\Cloner\Stub $stub, bool $isNested) : array
    {
        foreach ($c as $k => $v) {
            $a[] = new \MonorepoBuilder20210710\Symfony\Component\VarDumper\Caster\DsPairStub($k, $v);
        }
        return $a;
    }
    public static function castPair(\Ds\Pair $c, array $a, \MonorepoBuilder20210710\Symfony\Component\VarDumper\Cloner\Stub $stub, bool $isNested) : array
    {
        foreach ($c->toArray() as $k => $v) {
            $a[\MonorepoBuilder20210710\Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL . $k] = $v;
        }
        return $a;
    }
    public static function castPairStub(\MonorepoBuilder20210710\Symfony\Component\VarDumper\Caster\DsPairStub $c, array $a, \MonorepoBuilder20210710\Symfony\Component\VarDumper\Cloner\Stub $stub, bool $isNested) : array
    {
        if ($isNested) {
            $stub->class = \Ds\Pair::class;
            $stub->value = null;
            $stub->handle = 0;
            $a = $c->value;
        }
        return $a;
    }
}