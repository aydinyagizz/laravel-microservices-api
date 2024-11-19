<?php

namespace App\DTOs;

interface DTOInterface
{
    /**
     * Gelen bir array'den DTO oluşturur.
     */
    public static function fromArray(array $data): self;


    /**
     * DTO'yu bir array olarak döndürür.
     */
    public function toArray(): array;

}
