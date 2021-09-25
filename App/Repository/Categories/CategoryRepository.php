<?php


namespace App\Repository\Categories;


use App\Data\CategoryDTO;
use App\Repository\DatabaseAbstract;

class CategoryRepository extends DatabaseAbstract implements CategoryRepositoryInterface
{

    public function findOneById(int $id): CategoryDTO
    {
       return $this->db->query("
                SELECT id,
                       name
                FROM categories
                WHERE id = ?
        
        ")->execute([$id])
            ->fetch(CategoryDTO::class)
                ->current();
    }

    /**
     * @return \Generator|CategoryDTO[]
     */

    public function findAll(): \Generator
    {
       return $this->db->query("
                 SELECT id,
                       name
                FROM categories
        ")->execute()
            ->fetch(CategoryDTO::class);
    }
}