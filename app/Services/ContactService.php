<?php

namespace App\Services;

use App\Repositories\Contact\ContactRepository;
use Flash;
class ContactService
{
    protected $contactRepo;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepo = $contactRepository;
    }

    public function getAllData(array $payload)
    {
         $data = $this->contactRepo->all();
         return $data;
    }

    public function getCreate()
    {
        $contact = $this->contactRepo->all();
        return $contact;
    }

    public function store(array $params)
    {
        return $this->contactRepo->create($params);
    }

    public function getEdit(int $id)
    {
        $contact = $this->contactRepo->find($id);
        return [$contact];
    }

    public function update(array $params, int $id)
    {
        $contact = $this->contactRepo->find($id);
        $contact->update($params);
        return $contact;
    }

    public function destroy(int $id)
    {
        $contact = $this->contactRepo->find($id);
        if (empty($contact)) {
            \Flash::error('Không tìm thấy liên hệ');
            return;
        }
        $contact->delete($id);
        return null;
    }
}
