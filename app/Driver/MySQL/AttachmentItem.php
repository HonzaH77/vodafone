<?php

namespace App\Driver\MySQL;

use App\Attachment\AttachmentItemInterface;

class AttachmentItem implements AttachmentItemInterface
{
    protected string $id;
    protected string $fileName;
    protected string $filePath;
    protected string $createdAt;

    /**
     * Vytviří nový AttachmentItem.
     *
     * @param string $id
     * @param string $fileName
     * @param string $filePath
     * @param string $createdAt
     */
    public function __construct(string $id, string $fileName, string $filePath, string $createdAt)
    {
        $this->id = $id;
        $this->filePath = $filePath;
        $this->fileName = $fileName;
        $this->createdAt = $createdAt;
    }

    /**
     * Funkce vrací id.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Funkce vrací cestu k souboru.
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * Funkce vrací název souboru.
     *
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * Funkce vrací datum vytvoření přílohy.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
