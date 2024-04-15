<?php

namespace App\Repositories\Contact;

use App\Repositories\BaseRepository;
use App\Models\Contact;

/**
 * Class ContactRepository
 * @package App\Repositories\Contact
 */
class ContactRepositoryEloquent extends BaseRepository implements ContactRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Contact::class;
    }
}
