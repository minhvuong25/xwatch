<?php

namespace App\Services;

use App\Repositories\PageNews\PageNewsRepository;

class PageNewsService
{
    protected $pageNewRepo;
    public function __construct(PageNewsRepository $pageNewRepo)
    {
        $this->pageNewRepo = $pageNewRepo;
    }

    public function getAll(array $payload)
    {
        return $this->pageNewRepo->paginate(20);
    }
    public function create($input)
    {
         return $this->pageNewRepo->create($input);
    }
    public function find($id)
    {
         return $this->pageNewRepo->find($id);
    }

    public function delete($id)
    {
         return $this->pageNewRepo->delete($id);
    }

    public function update(int $id,array $input)
    {
         $pageNew = $this->pageNewRepo->find($id);
         return $pageNew->update($input);
    }
}
