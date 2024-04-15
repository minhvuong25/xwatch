<?php

namespace App\Services;

use App\Repositories\Logo\LogoRepository;
use Flash;

class LogoAjaxService
{
    protected $logoRepo;
    public function __construct(LogoRepository $logoRepository)
    {
        $this->logoRepo = $logoRepository;
    }

    public function update($request)
    {
        $logo = $this->logoRepo->find($request->id);
        $params['status'] = $request->status =='on' ? 1 : 0;
        if ($params['status'] == 1) {
            $image = $this->logoRepo->where('status', 1)->update(['status' => 0]);
        }
        $logo->update($params);
        return $logo;
    }

}
