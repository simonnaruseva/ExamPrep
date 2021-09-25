<?php


namespace App\Service\Items;


use App\Data\ItemDTO;
use App\Repository\Items\ItemRepositoryInterface;
use App\Service\UserServiceInterface;

class ItemService implements ItemServiceInterface
{
    /**
     * @var ItemRepositoryInterface
     */
    private $itemRepository;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(ItemRepositoryInterface $itemRepository, UserServiceInterface $userService)
    {
        $this->itemRepository = $itemRepository;
        $this->userService = $userService;
    }


    public function add(ItemDTO $itemDTO): bool
    {
        return $this->itemRepository->insert($itemDTO);
    }

    public function delete(int $id): bool
    {
        return $this->itemRepository->remove($id);
    }

    public function edit(ItemDTO $itemDTO): bool
    {
        return $this->itemRepository->update($itemDTO, $itemDTO->getId());
    }

    public function getOneById(int $id): ItemDTO
    {
       return $this->itemRepository->findOneById($id);
    }

    /**
     * @return \Generator|ItemDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->itemRepository->findAll();
    }

    /**
     * @return \Generator|ItemDTO[]
     */
    public function getAllByAuthor(): \Generator
    {
        $currentUser = $this->userService->currentUser();
        return $this->itemRepository->findAllByAuthor($currentUser->getId());
    }

}