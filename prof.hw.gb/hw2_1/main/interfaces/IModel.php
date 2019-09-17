<?php

namespace app\interfaces;

interface IModel
{
    public function getTableName(): string;
    public function getOne($id): string;
    public function getAll(): string;
}
