<?php

namespace App\Project;

interface ProjectItemInterface
{
    function getName();

    function getDescription();

    function getId();

    function getCreatedAt();

    function getAuthor();

    function getAuthorId();

    function setName(string $name);

    function setDescription(string $description);


}
