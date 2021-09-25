<?php


namespace App\Service\Items;


use App\Data\ItemDTO;

interface ItemServiceInterface
{
    public function add(ItemDTO $itemDTO) : bool;
    public function delete(int $id) : bool;
    public function edit(ItemDTO $itemDTO) : bool;

    public function getOneById(int $id) : ItemDTO;

    /**
     * @return \Generator|ItemDTO[]
     */
    public function getAll() : \Generator;

    /**
     * @return \Generator|ItemDTO[]
     */
    public function getAllByAuthor() : \Generator;

}