<?php

namespace App\Task;


interface TaskItemInterface
{
    public function getName():string;

    public function getId():string;

    public function getAuthorId():string;

    public function getType():string;

    public function getState():string;

    public function getEndDate():string;

    public function getCreatedAt():string;

    public function getProjectId(): string;

    public function setProjectName(string $name): void;

    public function getProjectName(): string;

    public function setName(string $name): void;

    public function setEndDate(string $date): void;

    public function setType(string $type): void;

    public function setState(string $state): void;

    public function save():void;

}
