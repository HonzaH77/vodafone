<?php

namespace App\Driver\MySQL;

use App\Project\ProjectItemInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Vrací ID projektu.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Vrací datum vytvoření projektu.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Vrací autora projektu.
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Vrací ID autora projektu.
     *
     * @return string
     */
    public function getAuthorId(): string
    {
        return $this->authorId;
    }

    /**
     * Nastaví jméno projektu na $name.
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Nastaví popis projektu na $description.
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Nastaví datum vytvoření projektu na $createdAt.
     *
     * @param string $createdAt
     * @return void
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**,
     * Nastaví jméno autora projektu na $author.
     *
     * @param string $author
     * @return void
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * Nastaví idAutora projektu na $authorId.
     *
     * @param string $authorId
     * @return void
     */
    public function setAuthorId(string $authorId): void
    {
        $this->authorId = $authorId;
    }

    /**
     * Funkce vytvoří projekt dle aktuálních parametrů, pokud ještě neexistuje.
     * Pokud existuje, zaktualizuje jeho atributy.
     *
     * @return bool
     */
    public function save(): bool
    {;
        $attributes = [
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => $this->authorId,
            'created_at' => $this->createdAt,
            'updated_at' => Carbon::now()
        ];

        $this->id != 0 ? DB::table('projects')->where('id', $this->id)->update($attributes) :
           $this->id = DB::table('projects')->insertGetId($attributes);
        return false;
    }
}
