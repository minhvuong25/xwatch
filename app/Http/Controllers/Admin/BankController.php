<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use App\Http\Controllers\Controller;
use App\Repositories\Bank\BankRepository;
use App\Http\Requests\Bank\BankStoreRequest;

class BankController extends Controller
{
    protected $bankService, $bankRepo;
    public function __construct(BankRepository $bankRepo)
    {
        $this->bankRepo = $bankRepo;
    }
    public function index()
    {
        $bank = $this->bankRepo->paginate(3);
        return view('admin.bank.index' , ['bank' => $bank]);
    }
    public function create()
    {
        return view('admin.bank.create');
    }
    public function store(BankStoreRequest $request)
    {
        $request = $request->validated();
        $this->bankRepo->create( $request);
        Flash::success('Thông tin được cập nhật');
        return redirect(route('bank.index'));
    }
    public function edit($id)
    {
        $bank = $this->bankRepo->find($id);
        return view('admin.bank.edit' , ['bank' => $bank]);
    }
    public function update(BankStoreRequest $request, $id)
    {
        $request = $request->validated();
        $this->bankRepo->update( $request , $id);
        Flash::success('Thông tin được cập nhật');
        return redirect(route('bank.index'));
    }
    public function destroy($id)
    {
        $bank = $this->bankRepo->find($id);
        if(empty($bank)){
            Flash::error('Thông tin ko ton tai');
        }
        $bank->delete();
        return redirect(route('bank.index'));
    }
}    