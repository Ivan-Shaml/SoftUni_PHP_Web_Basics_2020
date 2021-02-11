<?php


namespace Controller;


use DTO\RequestModels\UserRegisterBindingModel;
use DTO\ViewModels\UserLoginViewModel;
use DTO\ViewModels\UserProfileViewModel;
use Services\Users\UserServiceInterface;
use ViewEngine\ViewInterface;

class UsersController
{
    /** @var ViewInterface */
    private $view;

    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }

    public function login()
    {
        return $this->view->render();
    }

    public function loginProcess(UserServiceInterface $userService, UserRegisterBindingModel $model)
    {
        if ($userService->verifyCredentials($model->getUsername(), $model->getPassword())){
            $_SESSION['id'] = $userService->findByUsername($model->getUsername())->getId();
            header("Location: profile");
            exit;

        }
    }
    public function register()
    {
        $this->view->render();
    }

    public function registerProcess(UserRegisterBindingModel $bindingModel, UserServiceInterface $userService)
    {
        $userService->register($bindingModel);
        header("Location: login");
        exit;
    }

    public function profile(UserServiceInterface $userService)
    {
        if (!isset($_SESSION['id'])) {
            header("Location: login");
            exit;
        }

        $user = $userService->findOne($_SESSION['id']);
        $profileViewModel = new UserProfileViewModel($user->getUsername());
        $this->view->render($profileViewModel);
    }
}