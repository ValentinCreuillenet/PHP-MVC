<?php

interface CRUDInterface
{
    public function create($args): self;
    public function retrieve($id): self;
    public function update($id): bool;
    public function delete($id): bool;

}

?>