<?php

namespace App\Services;

use App\Http\Requests\StoreAddress\StoreAddressRequest;
use App\Models\StoreAddress;
use App\Repositories\StoreAddress\StoreAddressRepository;
use Flash;
class StoreAddressService
{
    protected $storeAddressRepo;
    public function __construct(StoreAddressRepository $storeAddressRepository)
    {
        $this->storeAddressRepo = $storeAddressRepository;
    }

    public function getAllData(array $payload)
    {
        $data = $this->storeAddressRepo->with('provinces')->all();
        return $data;
    }

    public function getCreate()
    {
        $storeAddress = $this->storeAddressRepo->all();
        return $storeAddress;
    }

    public function store($data)
    {
        return $this->storeAddressRepo->create($data);
    }

    public function getEdit(int $id)
    {
        $storeAddress = $this->storeAddressRepo->find($id);
        return [$storeAddress];
    }

    public function update(array $params, int $id)
    {
        $storeAddress = $this->storeAddressRepo->find($id);

        $storeAddress->update($params);
        return $storeAddress;
    }

    public function destroy(int $id)
    {
        $storeAddress = $this->storeAddressRepo->find($id);
        if (empty($storeAddress)) {
            \Flash::error('Không tìm thấy địa chỉ');
            return;
        }
        $storeAddress->delete($id);
        return null;
    }
}
