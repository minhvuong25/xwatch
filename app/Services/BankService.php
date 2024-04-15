<?php

namespace App\Services;

use App\Repositories\Bank\BankRepository;
use Flash;
class BankService
{
    protected $bankRepo;
    public function __construct(BankRepository $bankRepo)
    {
        $this->bankRepo = $bankRepo;
    }
    public function data()
    {
        return $this->bankRepo->all();
    }
    public function store(array $params)
    {
        return $this->bankRepo->create($params);
    }

    public function update(array $params, int $id)
    {
        $attr = $this->bankRepo->find($id);
        if (empty($attr)) {
            Flash::error('Attribute not found');

            return redirect(route('attributes.index'));
        }
        return $attr->update($params);

    }

    public function destroy(int $id)
    {
        $attr = $this->bankRepo->find($id);

        if (empty($attr)) {
            Flash::error('Attribute not found');

            return redirect(route('attributes.index'));
        }
        $attr->delete($id);
        return null;
    }
}
