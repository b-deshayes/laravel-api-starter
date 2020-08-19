<?php

namespace App\Listeners;

use App\Events\UserCreating;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\UserRepositoryInterface;

class AssignDefaultUserRole
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * Create the event listener.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the event.
     *
     * @param UserCreating $event
     * @return void
     */
    public function handle(UserCreating $event): void
    {
        $this->userRepository->assignDefaultRole($event->user);
    }
}
