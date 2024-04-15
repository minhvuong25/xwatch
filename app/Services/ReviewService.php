<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Review;
use Laracasts\Flash\Flash;
use App\Models\TotalReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Review\ReviewRepository;
use App\Http\Requests\Review\ReviewStoreRequest;
use App\Repositories\TotalReview\TotalReviewRepository;

class ReviewService
{
    protected $repo,$totalRepo;

    public function __construct(ReviewRepository $repository, TotalReviewRepository $totalRepo)
    {
        $this->repo = $repository;
        $this->totalRepo = $totalRepo;
    }

    /**
     * @param array $request
     * @return mixed
     */
    public function getData(array $request)
    {
        $query = $this->repo->query();

        if (!empty($request['time_start']) || !empty($request['time_end'])) {
            $query = $query->whereBetween('created_at', [
                Carbon::parse($request['time_start'])->format('Y-m-d H:i:s'),
                Carbon::parse($request['time_end'])->format('Y-m-d H:i:s')
            ]);
        }

        if (!empty($request['status'])) {
            $query = $query->where('status', $request['status']);
        }

        if (!empty($request['product_id'])) {
            $query =$query->where('entity_id', $request['product_id']);
        }

        return $query->orderBy('created_at', 'desc')->paginate(15);
    }

    public function show(int $id)
    {
        return $this->repo->find($id);
    }
    
    public function find($id)
    {
        $review = $this->repo->find($id);
        return $review;
    }

    // public function create($req)
    // {
    //     $input = $request->all();

    //     $input["user_id"] = Auth::user()->id;
 
    //     $this->reviewRepository->create($input);
 
    //     $total = TotalReview::firstOrNew(['entity_id' => $request->input('entity_id'), 'entity_type' => $request->input('entity_type')],
    //         [
    //             'total_user' => 0,
    //             'total_rating' => 0
    //         ]
    //     );
    //     $total->save();
 
    //     if ($request->input('status') == Review::REVIEW_STATUS_ACTIVE) {
    //         $array = [
    //             'total_user' => $total->total_user + 1,
    //             'total_rating' => $total->total_rating + $request->input('rating')
    //         ];
    //         TotalReview::where('entity_id', $request->input('entity_id'))->where('entity_type', $request->input('entity_type'))->update($array);
    //     }
 
    //      Flash::success('Review saved successfully.');
 
    //      return redirect(route('reviews.index'));

    // }

    public function store(ReviewStoreRequest $request)
    {
       $input = $request->all();

       $input["user_id"] = Auth::user()->id;

       $this->repo->create($input);

       $total = TotalReview::firstOrNew(['entity_id' => $request->input('entity_id'), 'entity_type' => $request->input('entity_type')],
           [
               'total_user' => 0,
               'total_rating' => 0
           ]
       );
       $total->save();

       if ($request->input('status') == Review::REVIEW_STATUS_ACTIVE) {
           $array = [
               'total_user' => $total->total_user + 1,
               'total_rating' => $total->total_rating + $request->input('rating')
           ];
           TotalReview::where('entity_id', $request->input('entity_id'))->where('entity_type', $request->input('entity_type'))->update($array);
       }
       return ;

        // Flash::success('Review saved successfully.');

        // return redirect(route('reviews.index'));
    }

    public function update(array $params, $id)
    {
        $review = $this->repo->find($id);

        if (isset($params['status'])) {
            $total = $this->totalRepo->firstOrNew([
               'entity_id' => $review->entity_id,
                'entity_type' => $review->entity_type, [
                    'total_user' => 0,
                    'total_rating' => 0
                ]
            ]);
            $total->save();

            if ($params['status'] == Review::REVIEW_STATUS_ACTIVE) {
                $array = [
                    'total_user' => $total->total_user + 1,
                    'total_rating' => $total->total_rating + $review->rating
                ];
            }

            if (in_array($params['status'], [Review::REVIEW_STATUS_PENDING, Review::REVIEW_STATUS_DISABLE])) {
                if ($review->status == Review::REVIEW_STATUS_ACTIVE) {
                    $array = [
                        'total_user' => $total->total_user - 1,
                        'total_rating' => $total->total_rating - $review->rating
                    ];
                }
            }

            if (isset($array)) {
                $this->totalRepo->where('entity_id', $review->entity_id)
                    ->where('entity_type', $review->entity_type)
                    ->update($array);
            }
        }

        $review->update($params);
        return $review;

    }



    // public function create($params)
    // {
    //     return $this->repo->create($params);
    // }


    
    //file upload
    // public function fileUpload(Request $request)
	// {
	// 	$input = $request->all();
	// 	$path = "public/review/" . date("y-m-d");
	// 	Storage::putFile($path, $input['file']);

	// 	$collection = Excel::toArray(new ExcelImport, $input['file']);
	// 	foreach ($collection[0] as $key => $value) {

	// 		if ($key == 0 || empty($value[0]) || empty($value[2]) || empty($value[3]) || empty($value[4]) || empty($value[5])  ) continue;
	// 		$aryImg = [];
	// 		if(!empty($value[6])){
    //             $aryImg[] =  $value[6];
	// 		}

	// 		if(!empty($value[7])){
    //             $aryImg[] =  $value[7];
	// 		}

	// 		if(!empty($value[8])){
    //             $aryImg[] =  $value[8];
	// 		}

	// 		$day = rand(1,28);
	// 		$month = rand(1,11);
	// 		$hours = rand(1,23);
	// 		$minute = rand(1,50);
	// 		$second = rand(1,50);

	// 		$review = new Review();
	// 		$review->user_id = $value[0];
	// 		$review->entity_id = $value[1];
	// 		$review->entity_type = $value[2];
	// 		$review->status = $value[3];
	// 		$review->content = $value[4];
	// 		$review->rating = $value[5];
	// 		$review->img_review = json_encode($aryImg);
	// 		$review->created_at = "2023-".$month."-".$day." ".$hours.":".$minute.":".$second."";
	// 		$review->save();

	// 		$totalReview = TotalReview::where("entity_id",$review->entity_id)->first();
	// 		if(!empty($totalReview)){
	// 			$totalReview->total_rating = $totalReview->total_rating + $review->rating;
	// 			$totalReview->total_user = $totalReview->total_user + 1;
	// 			$totalReview->save();
	// 		}else{
	// 			$totalReview = new TotalReview();
	// 			$totalReview->entity_id = $review->entity_id;
	// 			$totalReview->entity_type = $review->entity_type;
	// 			$totalReview->total_rating =  $review->rating;
	// 			$totalReview->total_user = 1;
	// 			$totalReview->save();
	// 		}
	// 	}

	// 	$message = 'Tạo review sản phẩm thành công: ';

	// 	Flash::success($message);
	// 	return redirect(route('reviews.index'));
	// }
}
