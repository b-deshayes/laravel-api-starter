<?php

namespace App\Listeners;

use App\Events\UserCreated;
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
     * @param UserCreated $event
     * @return void
     */
    public function handle(UserCreated $event): void
    {
        $this->userRepository->assignDefaultRole($event->user);
    }
}
