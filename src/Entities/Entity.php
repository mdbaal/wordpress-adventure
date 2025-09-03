<?php

namespace WordPressAdventure\Entities;

class Entity
{
    protected int $id = -1;

    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id): void{
        if($id < 0) return;

        $this->id = $id;
    }
}