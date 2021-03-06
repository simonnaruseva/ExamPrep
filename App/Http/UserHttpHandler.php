<?php

namespace App\Http;

use App\Data\ErrorDTO;
use App\Data\UserDTO;
use App\Http\HttpHandlerAbstract;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function index(UserServiceInterface $userService)
    {
        $this->render("home/index");
    }

    public function all(UserServiceInterface $userService){
        $this->render("users/all", $userService->getAll());
    }

    public function profile(UserServiceInterface $userService,
                         array $formData = [])
    {
        if(!$userService->isLogged())
        {
            $this->redirect("login.php");
        }

        $currentUser = $userService->currentUser();

        if (isset($formData['edit'])) {
            $this->handleEditProcess($userService, $formData);
        } else {
            $this->render("users/profile", $currentUser);
        }
    }

    public function myProfile(UserServiceInterface $userService)
    {
        $currentUser = $userService->currentUser();
        $this->render("users/myProfile",$currentUser);


    }

    public function login(UserServiceInterface $userService,
                          array $formData = [])
    {
        $username = "";
        if (isset($formData['login'])) {
            $this->handleLoginProcess($userService, $formData);
        } else {
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            }
            $this->render("users/login", $username === "" ? "" : $username);
        }
    }

    public function register(UserServiceInterface $userService,
                             array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($userService, $formData);
        } else {
            $this->render("users/register");
        }
    }

    private function handleRegisterProcess($userService, $formData)
    {
        try {
            /**
             * @var UserDTO $user
             */
            $user = $this->dataBinder->bind($formData, UserDTO::class);

            /** @var UserServiceInterface $userService */
            $userService->register($user, $formData['confirm_password']);
            $_SESSION['username'] = $user->getUsername();
            $this->redirect("login.php");
        } catch(\Exception $ex) {
                $this->render("users/register", null,
                [$ex->getMessage()]);
        }
    }

    private function handleLoginProcess($userService, $formData)
    {
        try {
            /** @var UserServiceInterface $userService */
            $user = $userService->login($formData['username'], $formData['password']);

            $currentUser = $this->dataBinder->bind($formData, UserDTO::class);

            if (null !== $user) {
                $_SESSION['id'] = $user->getId();
                $this->redirect("profile.php");
            }
        } catch(\Exception $ex) {
            $this->render("users/login", null,
                [$ex->getMessage()]);
        }

    }

    private function handleEditProcess($userService, $formData)
    {
        /** @var UserServiceInterface $userService */
        $user = $this->dataBinder->bind($formData, UserDTO::class);


        if($userService->edit($user)){
            $this->redirect("profile.php");
        }else{
            $this->render("users/login", null,
                new ErrorDTO("Username already exist."));
        }
    }


}