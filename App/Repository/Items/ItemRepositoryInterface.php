<?php


namespace App\Repository\Items;


use App\Data\ItemDTO;

interface ItemRepositoryInterface
{
    public function insert(ItemDTO $itemDTO) : bool;
    public function remove(int $id) : bool;
    public function update(ItemDTO $itemDTO, int $id) : bool;
    public function findOneById(int $id) : ItemDTO;

    /**
     * @return \Generator|ItemDTO[]
     */
    public function findAll() : \Generator;

    /**
     * @param int $id
     * @return \Generator|ItemDTO[]
     */
    public function findAllByAuthor(int $id) : \Generator;
}