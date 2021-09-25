<?php


namespace App\Service\Categories;


use App\Data\CategoryDTO;

interface CategoryServiceInterface
{
    public function getOneById(int $id) : CategoryDTO;

    /**
     * @return \Generator|CategoryDTO[]
     */
    public function getAll() : \Generator;

}