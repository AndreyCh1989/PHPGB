<?php

namespace app\interfaces;

interface IModel
{
    public static function getTableName(): string;
    public function getId(): int;
    public function clearUpdated();
    public static function getOne($id): IModel;
    public static function getAll(): array;
    public static function getRange($from, $to): array;
    public function save(): bool;
    public function delete(): bool;
}
