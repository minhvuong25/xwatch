<?php

namespace App\Services;

use App\Repositories\User\UserRepository;
use App\Repositories\UserAgent\UserAgentRepository;
use App\Http\Requests\UserAgent\UserAgentStoreRequest;

class UserAgentService
{
    //agent
    protected $userAgentRepo;
    public function __construct(UserAgentRepository $userAgentRepo)
    {
        $this->userAgentRepo = $userAgentRepo;
    }

    public function all()
    {
        return $this->userAgentRepo->all();
    }
    public function find($id)
    {
        return $this->userAgentRepo->find($id);
    }

    public function create($input)
    {
        return $this->userAgentRepo->create($input);
    }

    public function update(int $id, array $params)
    {
        $userAgent = $this->userAgentRepo->find($id);
        $userAgent->update($params);
        return $userAgent;
    }
    
    public function delete($id)
    {
        return $this->userAgentRepo->delete($id);
    }
}
