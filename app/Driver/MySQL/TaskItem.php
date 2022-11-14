<?php

namespace App\Driver\MySQL;

use App\Task\TaskItemInterface;
use function App\Helpers\taskRepository;

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
     * Funkce vytvoří TaskItem se zadanými prametry.
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Funkce vrací ID úkolu.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Funkce vrací ID autora úkolu.
     *
     * @return string
     */
    public function getAuthorId(): string
    {
        return $this->authorId;
    }

    /**
     * Funkce vrací typ úkolu.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Funkce vrací stav úkolu.
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * FUnkce vrací datum ukončení úkolu.
     *
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * Funkce vrací datum vytvoření úkolu.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Funkce vrátí ID projektu, kte kterému patří tento úkol.
     *
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }

    /**
     * Funkce vrátí název projektu, ke kterému patří tento úkol.
     *
     * @return string
     */
    public function getProjectName(): string
    {
        return $this->projectName;
    }

    /**
     * Funkce nastaví název projektu na $name, ke kterému patří tento úkol.
     *
     * @return string
     */
    public function setProjectName(string $name): void
    {
        $this->projectName = $name;
    }

    /**
     * Funkce nastaví jméno úkolu na $name.
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Funkce nastaví datum ukončení úkolu na $date.
     *
     * @param string $date
     * @return void
     */
    public function setEndDate(string $date): void
    {
        $this->endDate = $date;
    }

    /**
     * Funkce nastaví typ úkolu na $type.
     *
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Funkce nastaví stav úkolu na $state.
     *
     * @param string $state
     * @return void
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * Funkce zaktualizuje údaje o úkolu.
     *
     * @return void
     */
    public function save(): void
    {
        $attributes = [
            'name' => $this->name,
            'endDate' => $this->endDate,
            'type' => $this->type,
            'state' => $this->state,
        ];

        taskRepository()->updateTask($this->id, $attributes);
    }
}
