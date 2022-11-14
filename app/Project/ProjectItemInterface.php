<?php

namespace App\Project;

interface ProjectItemInterface
{
    public function getName(): string;

    public function getDescription(): string;

    public function getId(): string;

    public function getCreatedAt(): string;

    public function getAuthor(): string;

    public function getAuthorId(): string;

    public function setName(string $name): void;

    public function setDescription(string $description): void;

    public function setAuthor(string $author): void;

    public function setAuthorId(string $authorId): void;

    public function save(): void;
}
