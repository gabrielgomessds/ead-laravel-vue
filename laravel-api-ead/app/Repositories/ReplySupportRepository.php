<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Models\User;
use App\Repostitories\Traits\RepositoryTrait;

class ReplySupportRepository
{
    protected $entity;
    use RepositoryTrait; 

    public function __construct(ReplySupport $model)
    {
        $this->entity = $model;
    }

    public function createReplyToSupport(array $data)
    {
        $user = $this->getUserAuth();

        return $this->getSupport($supportId)
                    ->replies()
                    ->create([
                        'description' => $data['description'],
                        'user_id' => $user->id
                    ])
                    ->orderBy('updated_at')
                    ->get();
    }



 
}