<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ReplySupportRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;


class ReplySupportController extends Controller
{
    protected $repository;

    public function __construct(ReplySupportRepository $replySupportRepository)
    {
        $this->repository = $replySupportRepository;
    }

    public function createReply(StoreReplySupport $request)
    {
        $reply = $this->repository->createReplyToSupport($request->validated());

        return new ReplySupportResource($reply);
    }
}
