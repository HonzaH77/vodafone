<?php

namespace App\Driver\MySQL;

use App\Task\TaskItemInterface;

class TaskItem implements TaskItemInterface
{
    protected string $id;
    protected string $name;
    protected string $createdAt;
    protected string $authorId;
    protected string $type;
    protected string $state;
    protected string $endDate;
    protected string $projectId;
    protected ?string $projectName;


    /**
     * Funkce TaskItem se zadanými prametry.
     *
     * @param string $id
     * @param string $name
     * @param string $authorId
     * @param string $type
     * @param string $state
     * @param string $endDate
     * @param string $createdAt
     */
    public function __construct(string $id, string $name, string $authorId, string $type, string $state, string $endDate,
                                string $createdAt, string $projectId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->authorId = $authorId;
        $this->type = $type;
        $this->state = $state;
        $this->endDate = $endDate;
        $this->projectId = $projectId;
    }

    /**
     * Funkce vrací název úkolu.
     *
     * @return string
     */
    function getName(): string
    {
        return $this->name;
    }

    /**
     * Funkce vrací ID úkolu.
     *
     * @return string
     */
    function getId(): string
    {
        return $this->id;
    }

    /**
     * Funkce vrací ID autora úkolu.
     *
     * @return string
     */
    function getAuthorId(): string
    {
        return $this->authorId;
    }

    /**
     * Funkce vrací typ úkolu.
     *
     * @return string
     */
    function getType(): string
    {
        return $this->type;
    }

    /**
     * Funkce vrací stav úkolu.
     *
     * @return string
     */
    function getState(): string
    {
        return $this->state;
    }

    /**
     * FUnkce vrací datum ukončení úkolu.
     *
     * @return string
     */
    function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * FUnkce vrací datum vytvoření úkolu.
     *
     * @return string
     */
    function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    function getProjectId(): string
    {
        return $this->projectId;
    }

    function getProjectName(): string
    {
        return $this->projectName;
    }

    function setProjectName(string $name): void
    {
        $this->projectName = $name;
    }

}
