<?php


namespace App\Http;


use App\Data\EditItemDTO;
use App\Data\ItemDTO;
use App\Service\Categories\CategoryServiceInterface;
use App\Service\Items\ItemServiceInterface;
use App\Service\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class ItemHttpHandler extends HttpHandlerAbstract
{


    /**
     * @var ItemServiceInterface
     */
    private $itemService;

    /**
     * @var UserServiceInterface
     */
    private UserServiceInterface $userService;

    /**
     * @var CategoryServiceInterface
     */
    private  $categoryService;


    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                ItemServiceInterface $itemService,
                                UserServiceInterface $userService,
                                CategoryServiceInterface $categoryService)
    {
        parent::__construct($template,$dataBinder);
        $this->itemService = $itemService;
        $this->userService = $userService;
        $this->categoryService = $categoryService;
    }

    public function add(array $formData = [])
    {
        if(!$this->userService->isLogged()) {
            $this->redirect("login.php");
            exit;
        }

        if(isset($formData['add'])) { //tva go pravq s cel da ne pisha dali e setnato tva pole tva tav i vste drugi poleta ami prosto kazvam ako e setnato metodcheto add
            $this->handleInsertProcess($formData);
        } else {
            $categories = $this->categoryService->getAll();
            $this->render("items/add",$categories);

        }
    }

    private function handleInsertProcess($formData)
    {
        try {
            $currentUser = $this->userService->currentUser();
            $category = $this->categoryService->getOneById($formData['category_id']);
            $item = $this->dataBinder->bind($formData, ItemDTO::class);
            /**@var ItemDTO $item */
            $item->setCategory($category);
            $item->setUser($currentUser);
            $this->itemService->add($item);
            $this->redirect("my_items.php");

        } catch (\Exception $ex) {

        }



    }

    public function allItems()
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
            exit;
        }

        $items = $this->itemService->getAll();
        $this->render("items/all_items",$items);

    }

    public function allItemsByAuthor()
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
            exit;
        }

        $items = $this->itemService->getAllByAuthor();
        $this->render("items/my_items",$items);
    }

    public function details($getData = [])
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
            exit;
        }

        $item = $this->itemService->getOneById($getData['id']);
        $this->render("items/view_item", $item);
    }

    public function deleteItem($getData = [])
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
            exit;
        }

        $this->itemService->delete($getData['id']);
        $this->redirect("my_items.php");
    }

    public function edit($formData = [], $getData = [])
    {
        if (!$this->userService->isLogged()) {
            $this->redirect("login.php");
            exit;
        }

        if(isset($formData['edit'])) {
            $this->handleEditProcess($formData,$getData);
        } else{

            $item = $this->itemService->getOneById($getData['id']);
            $categories = $this->categoryService->getAll();
            $editItemDTO = new EditItemDTO();
            $editItemDTO->setItem($item);
            $editItemDTO->setCategories($categories);

            $this->render("items/edit_item", $editItemDTO);
        }

    }

    private function handleEditProcess($formData,$getData)
    {
        try {
            $currentUser = $this->userService->currentUser();
            $category = $this->categoryService->getOneById($formData['category_id']);
            $item = $this->dataBinder->bind($formData, ItemDTO::class);
            /**@var ItemDTO $item */
            $item->setCategory($category);
            $item->setUser($currentUser);
            $item->setId($getData['id']);
            $this->itemService->edit($item);
            $this->redirect("my_items.php");

        } catch (\Exception $ex) {

        }
    }

}