<?php

namespace WordPressAdventure\Entities;

class Location
{
    private string $title = "";
    private string $locationText = "";
    private array $lootTable = [];
    private array $monsterTable = [];
    private array $connectedLocations = [];

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getLocationText(): string
    {
        return $this->locationText;
    }

    public function setLocationText(string $locationText): void
    {
        $this->locationText = $locationText;
    }

    public function getLootTable(): array
    {
        return $this->lootTable;
    }

    public function setLootTable(array $lootTable): void
    {
        $this->lootTable = $lootTable;
    }

    public function getMonsterTable(): array
    {
        return $this->monsterTable;
    }

    public function setMonsterTable(array $monsterTable): void
    {
        $this->monsterTable = $monsterTable;
    }

    public function getConnectedLocations(): array{
        return $this->connectedLocations;
    }

    public function setConnectedLocations(array $locations): void{
        $this->connectedLocations = $locations;
    }
}