<?php

namespace WordPressAdventure\Entities;

class Character extends Entity
{
    private string $name = "";
    private array $equipment = [
        "head" => "",
        "body" => "",
        "pants" => "",
        "boots" => "",
        "weapon" => "",
        "shield" => "",
    ];
    
    private array $stats = [
        "health" => 100,
        "strength" => 0,
        "defence" => 0,
    ];

    private int $gold = 0;
    private int $level = 0;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEquipment(string $key = ""): array|string
    {
        if(!empty($key) && !in_array($key,array_keys($this->equipment))){
            return $this->equipment[$key];
        }

        return $this->equipment;
    }

    public function setEquipment(array|string $equipment, string $key = ""): void
    {
        if(is_string($equipment) && empty($key)) return;
        
        if(is_string($equipment) && !empty($key) && !in_array($key,array_keys($this->equipment))){
            $this->equipment[$key] = $equipment;
        }

        $this->equipment = $equipment;
    }

    public function getStats(string $key = ""): array|string
    {
        if(!empty($key) && in_array($key,array_keys($this->stats))){
            
            return $this->stats[$key];
        }

        return $this->stats;
    }

    public function setStats(array|string $stats, string $key = ""): void
    {
        if(is_string($stats) && empty($key)) return;
        
        if(is_string($stats) && !empty($key) && !in_array($key,array_keys($this->stats))){
            $this->stats[$key] = $stats;
        }

        $this->stats = $stats;
    }

    public function getGold(): int
    {
        return $this->gold;
    }

    public function addGold(int $amount): void{
        $this->gold += abs($amount);
    }

    public function removeGold(int $amount): void{
        $this->gold -= abs($amount);
    }

    public function setGold(int $gold): void
    {
        $this->gold = $gold;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function addLevel(): void{
        $this->level++;
    }
}