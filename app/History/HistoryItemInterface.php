<?php

namespace App\History;

interface HistoryItemInterface
{
    function getState(): string;

    function getId(): string;

    function getComment(): string;

    function getCreatedAt(): string;


}
