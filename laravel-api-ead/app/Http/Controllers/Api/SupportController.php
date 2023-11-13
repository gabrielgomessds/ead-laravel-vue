<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupport;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;

class SupportController extends Controller
{
    protected $repository;

    public function __construct(SupportRepository $supportRepository)
    {
        $this->repository = $supportRepository;
    }

    public function index(Request $request)
    {
        $supports = $this->repository->getSupports($request->all());

        return SupportResource::collection($supports);
    }

    public function store(StoreSupport $request)
    {
        $supports = $this->repository->createNewSupport($request->validated());

        return new SupportResource($supports);
    }

    public function createReply(StoreReplySupport $request, $supportId)
    {
        $reply = $this->repository->createReplyToSupportId($supportId, $request->validated());

        return new ReplySupportResource($reply);
    }

}
