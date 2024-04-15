<?php

namespace App\Services;

use Flash;
class OrderService
{
    // protected $storeAddressRepo;
    // public function __construct(StoreAddressRepository $storeAddressRepository)
    // {
    //     $this->storeAddressRepo = $storeAddressRepository;
    // }

    public function getAllData(array $payload)
    {
        $data = $this->storeAddressRepo->all();
        return $data;
    }

    public function getCreate()
    {
        $storeAddress = $this->storeAddressRepo->all();
        return $storeAddress;
    }

    public function store($data)
    {
    //    try{
    //     return $this->storeAddressRepo->create(array_merge($data, ['province' => 'test'])); 
    //    } catch (\Exception $e) {
    //     dd($e);
    //    }
        try{
            return $this->storeAddressRepo->create($data); 
        } catch (\Exception $e) {
            dd($e);
        }
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
