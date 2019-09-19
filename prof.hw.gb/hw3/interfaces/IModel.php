<?php

namespace app\interfaces;

interface IModel
{
    public static function getTableName(): string;
    public function getId(): int;
    public static function getOne($id): IModel;
    public static function getAll(): array;
    public function insert(): bool;
    public function update(): bool;
    public function delete(): bool;
}
