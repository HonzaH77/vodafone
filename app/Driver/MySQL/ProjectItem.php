<?php

namespace App\Driver\MySQL;

use App\Project\ProjectItemInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function App\Helpers\projectRepository;

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
     * @param string $authorId
     */
    public function __construct(string $id, string $name, string $description, string $createdAt, string $authorId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
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
     *
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
    function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Nastaví popis projektu na $description.
     *
     * @param string $description
     * @return void
     */
    function setDescription(string $description): void
    {
        $this->description = $description;
    }


    /**,
     * Nastaví jméno autora projektu na $author.
     *
     * @param string $author
     * @return void
     */
    function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * Nastaví idAutora projektu na $authorId.
     *
     * @param string $authorId
     * @return void
     */
    function setAuthorId(string $authorId): void
    {
        $this->authorId = $authorId;
    }

    /**
     * Funkce zaktualizuje údaje o projektu.
     *
     * @return void
     */
    function save(): void
    {
        $attributes = [
            'name' => $this->name,
            'description' => $this->description,
        ];

        projectRepository()->updateProject($this->id, $attributes);
    }
}
