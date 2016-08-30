<?php
namespace Bot\Types;


interface TypeInterface
{
    public static function fromResponse($data);
}