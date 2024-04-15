<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Consultation\ConsultationRepository;

class ConsultationController extends Controller
{
    protected $consultationRepo;
    protected $productRepo;
    public function __construct(ConsultationRepository $consultationRepo , ProductRepository $productRepo)
    {
        $this->consultationRepo = $consultationRepo;
        $this->productRepo = $productRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
         $payloads = $request->all();
         $consultations = $this->getAll($payloads);
         return view('admin.consultation.index')->with('consultations', $consultations);
     }

     public function getAll(array $payloads)
     {
         $consultations = $this->consultationRepo ->orderBy('created_at', 'DESC')->paginate(20);
 
         if (isset($payloads['search'])) {
             $consultations = $this->consultationRepo->where("phone", "like", '%' . $payloads["search"] . '%')->paginate(10);
         }
 
         return $consultations;
     }



    public function destroy($id)
    {
        $consultations = $this->consultationRepo->find($id);
        if (empty($consultations)) {
            Flash::error('Không tìm thấy thông tin');
            return redirect(route('consultation.index'));
        }
        $consultations->delete($id);
        Flash::success('Xóa dữ liệu thành công');
        return redirect(route('consultation.index'));
    }
}
