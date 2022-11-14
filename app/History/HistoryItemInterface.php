<?php

namespace App\History;

interface HistoryItemInterface
{
    public function getState(): string;

    public function getId(): string;

    public function getComment(): string;

    public function getCreatedAt(): string;

}
