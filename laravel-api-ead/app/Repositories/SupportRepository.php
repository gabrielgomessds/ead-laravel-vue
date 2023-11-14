<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;

class SupportRepository
{
    protected $entity;

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

        return $this->getSupport($supportId)
                    ->replies()
                    ->create([
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

    private function getUserAuth(): User
    {
        //return auth()->user();
        return User::first();

    }
}