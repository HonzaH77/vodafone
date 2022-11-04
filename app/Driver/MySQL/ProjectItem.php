<?php

namespace App\Driver\MySQL;

use App\Project\ProjectItemInterface;

class ProjectItem implements ProjectItemInterface
{
    protected string $id;
    protected string $name;
    protected string $description;
    protected string $createdAt;
    protected string $author;
    protected string $authorId;


    /**
     * Vytvoří ProjectItem se zadanými prametry.
     *
     * @param string $id
     * @param string $name
     * @param string $description
     * @param string $createdAt
     * @param string $author
     * @param string $authorId
     */
    public function __construct(string $id, string $name, string $description, string $createdAt, string $author, string $authorId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->author = $author;
        $this->authorId = $authorId;
    }

    /**
     * Vrací jméno projektu.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Vrací popis porojektu.
     *
     * @return string
     */
    function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Vrací ID projektu.
     *
     * @return string
     */
    function getId(): string
    {
        return $this->id;
    }

    /**
     * Vrací datum vytvoření projektu.
     *
     * @return string
     */
    function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Vrací autora projektu.
     *
     * @return string
     */
    function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Vrací ID autora projektu.
     * @return string
     */
    function getAuthorId(): string
    {
        return $this->authorId;
    }

    /**
     * Nastaví jméno projektu na $name.
     *
     * @param string $name
     * @return void
     */
    function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Nastaví popis projektu na $description.
     *
     * @param string $description
     * @return void
     */
    function setDescription(string $description)
    {
        $this->description = $description;
    }
}
