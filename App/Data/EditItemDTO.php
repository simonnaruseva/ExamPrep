<?php


namespace App\Data;


class EditItemDTO
{
    /**
     * @var ItemDTO
     */
    private $item;

    /**
     * @var CategoryDTO[] $categories
     */
    private $categories;


    /**
     * @return ItemDTO
     */
    public function getItem(): ItemDTO
    {
        return $this->item;
    }

    /**
     * @param ItemDTO $item
     */
    public function setItem(ItemDTO $item): void
    {
        $this->item = $item;
    }

    /**
     * @return CategoryDTO[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param CategoryDTO[] $categories
     */
    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }

}