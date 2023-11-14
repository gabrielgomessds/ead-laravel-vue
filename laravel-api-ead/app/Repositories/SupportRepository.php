<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use App\Repositories\Traits\RepositoryTrait;

class SupportRepository
{
    protected $entity;

    use RepositoryTrait;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(array $filters = [])
    {
        return $this->getUserAuth()
                    ->supports()
                    ->where(function ($query) use($filters) {
                        if(isset($filters['lesson'])){
                            $query->where('lesson_id', $filters['lesson']);
                        }

                        if(isset($filters['status'])){
                            $query->where('status', $filters['status']);
                        }

                        if(isset($filters['filter'])){
                            $filter = $filter['filter'];
                            $query->where('description','LIKE', "%{$filter}%");
                        }

                    })
                    ->get();
    }

    public function createNewSupport(array $data): Support
    {
        $support = $this->getUserAuth()
             ->supports()
             ->create([
                    'lesson_id' => $data['lesson'],
                    'status' => $data['status'],
                    'description' => $data['description'],
             ]);

             return $support;
    }

    public function createReplyToSupportId(string $supportId, array $data)
    {
        $user = $this->getUserAuth();

        $support = app(SupportRepository::class)->getSupport($supportId);

        return $this->entity
                    ->create([
                        'support_id' => $data['support'],
                        'description' => $data['description'],
                        'user_id' => $user->id
                    ])
                    ->orderBy('updated_at')
                    ->get();
    }

    private function getSupport(string $id)
    {
        //return auth()->user();
        return $this->entity->findOrFail($id);

    }

}