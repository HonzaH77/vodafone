<?php

namespace App\Task;


interface TaskItemInterface
{
    function getName():string;

    function getId():string;

    function getAuthorId():string;

    function getType():string;

    function getState():string;

    function getEndDate():string;

    function getCreatedAt():string;

    function getProjectId(): string;

    function setProjectName(string $name): void;

    function getProjectName(): string;

}
