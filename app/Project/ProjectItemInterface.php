<?php

namespace App\Project;

interface ProjectItemInterface
{
    function getName(): string;

    function getDescription(): string;

    function getId(): string;

    function getCreatedAt(): string;

    function getAuthor(): string;

    function getAuthorId(): string;

    function setName(string $name): void;

    function setDescription(string $description): void;

    function setCreatedAt(string $createdAt): void;

    function setAuthor(string $author): void;

    function setAuthorId(string $authorId): void;

    function save(): bool;
}
