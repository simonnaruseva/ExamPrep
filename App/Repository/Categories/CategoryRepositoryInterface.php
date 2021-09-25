<?php


namespace App\Repository\Categories;


use App\Data\CategoryDTO;

interface CategoryRepositoryInterface
{
    public function findOneById(int $id): CategoryDTO;

    /**
     * @return \Generator|CategoryDTO[]
     */
    public function findAll(): \Generator;
}