<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeValue;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\ProductManual\ProductManualRepository;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Http\Requests\ProductVariant\ProductVariantStoreRequest;
use Illuminate\Support\Facades\Redirect;

class ProductVariantController extends Controller
{
    //product variant :bien the
    protected $productVariantRepo, $attributeRepo, $productRepo, $attributeValueRepo;
    public function __construct(
        ProductManualRepository $productVariantRepo,
        AttributeRepository $attributeRepo,
        ProductRepository $productRepo,
        AttributeValueRepository $attributeValueRepo
    )
    {
        $this->productVariantRepo = $productVariantRepo;
        $this->attributeRepo = $attributeRepo;
        $this->productRepo = $productRepo;
        $this->attributeValueRepo = $attributeValueRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->productVariantRepo->query();
        $params = $request->all();

        if (isset($params['id'])) {
            $query = $query->where('id', $params['id']);
        }

        if (isset($params['product_id'])) {
            $query = $query->where('product_id', $params['product_id']);
        }

        if (isset($params['sku'])) {
            $query = $query->where('sku', $params['sku']);
        }

        $productVariants = $query->paginate(15);

        return view('admin.product_variants.index')
            ->with('productVariants', $productVariants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!isset($request->product_id)) {
            return redirect(route('products.index'));
        }

        $attributes = $this->attributeRepo->all();
        $product = $this->productRepo->with(['productAttributeValue' => function($query) {
            $query->where('product_variant_id', '>', 0);

        }, 'productAttributeValue.attributeValue'])
            ->where('id', $request->product_id)
            ->first();
        $variantAttribute = $attributeValue = [];

        if ($product->productAttributeValue->count()) {
            foreach ($product->productAttributeValue as $value) {
                $variantAttribute[] = $value->attributeValue->attribute_id;
            }
        }
        if (!empty($variantAttribute))
            $attributeValue = $this->attributeValueRepo->whereIn("attribute_id", $variantAttribute)->get();
        return view('admin.product_variants.create')
            ->with("variantAttribute", $variantAttribute)
            ->with("variantAttributeValue", $attributeValue)
            ->with("attributes", $attributes)
            ->with("product", $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductVariantStoreRequest $request )
    {
        $input = $request->all();
        $input["slug"] = Str::slug($input["name"]);
        $result = $this->variantAttributeValidate(
            $input["product_id"],
            $input["attribute_id_1"],
            $input["attribute_value_id_1"],
            $input["attribute_id_2"]?? 0,
            $input["attribute_value_id_2"] ?? 0,
        );
        if(!$result["status"]){
            Flash::error($result["message"]);
            return redirect()->back();
        }

        try{
            DB::beginTransaction();
            $variant = $this->productVariantRepo->create($input);
            $this->createProductVariantAttribute(
                $input["product_id"],
                $variant->id,
                [$input["at"]]
            );
        }catch(Exception $e){
            DB::rollBack();
            // pd($exception->getMessage() , $exception->getCode(), $exception->getLine());
        }

        Flash::success('Product Variants saved successfully');
        return redirect(route('productVariants.index'));
    }
    
    public function createProductVariantAttribute($product_id, $variant_id, $aryAttributeValue = [])
    {
        foreach ($aryAttributeValue as $attribute_value) {
            if ($attribute_value == 0) continue;

            $productAttribute = new ProductAttributeValue();
            $productAttribute->product_id = $product_id;
            $productAttribute->product_variant_id = $variant_id;
            $productAttribute->attribute_value_id = $attribute_value;
            $productAttribute->save();
        }

        return true;
    }

    public function variantAttributeValidate($product_id, $attr1, $attrValue1, $attr2 = 0, $attrValue2 = 0)
    {
        if ($attr1 == $attr2)
            return ["status" => false, "message" => "Duplicate Attribute"];

        if ($attrValue1 == $attrValue2)
            return ["status" => false, "message" => "Duplicate Attribute Value"];

        $product = $this->productRepo->with(['productAttributeValue' => function ($query) {
            $query->where('product_variant_id', '>', 0);
        }, "productAttributeValue.attributeValue"])->where("id", $product_id)->first();

        if ($product->productAttributeValue->count() == 0)
            return ["status" => true, "messages" => ""];

        $aryAttrId = $attributeValueKey = [];
        foreach ($product->productAttributeValue as $attributeValue) {
            /*Nhỏ hơn 3 vì mình chỉ cho tôi đa 2 option thôi*/
            if (count($aryAttrId) < 3)
                $aryAttrId[$attributeValue->attributeValue->attribute_id] = $attributeValue->attributeValue->attribute_id;

            if (isset($attributeValueKey[$attributeValue->product_variant_id])) {
                $attributeValueKey[$attributeValue->product_variant_id] .= "_" . $attributeValue->attribute_value_id;
                continue;
            }

            $attributeValueKey[$attributeValue->product_variant_id] = $attributeValue->attribute_value_id;
        }

        $valueKey = '';
        if ($attrValue1 != 0)
            $valueKey = $attrValue1;

        if ($attr2 != 0)
            $valueKey = $valueKey . "_" . $attrValue2;

        if (in_array($valueKey, $attributeValueKey))
            return ["status" => false, "message" => "Attribute available !"];

        if ($attr1 != 0) {
            if (!in_array($attr1, $aryAttrId))
                return ["status" => false, "message" => "Attribute 1 ID not in array !"];
        }

        if ($attr2 != 0) {
            if (!in_array($attr2, $aryAttrId))
                return ["status" => false, "message" => "Attribute 2 ID not in array !"];
        }

        $attrValues = $this->attributeValueRepo->whereIn("id", [$attrValue1, $attrValue2])->get();
        foreach ($attrValues as $val) {
            if (!in_array($val->attribute_id, $aryAttrId))
                return ["status" => false, "message" => "Attribute value 1 ID not in array !"];
        }

        return ["status" => true, "messages" => ""];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productVariant = $this->productVariantRepo->find($id);
        
        if (empty($productVariant)) {
            Flash::error('User Agent not found');
            return redirect(route('productVariants.index'));
        }

        return view('admin.product_variants.edit', compact('productVariant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $productVariant = $this->productVariantRepo->with([
            "productAttributeValue",
            "productAttributeValue.attributeValue",
            "productAttributeValue.attributeValue.attribute"
        ])->find($id);
       $locations = $this->productVariantRepo->getLocationWithStock($id);
        if (empty($productVariant)) {
            Flash::error('Product Variant not found');

            return redirect(route('productVariants.index'));
        }

        if (!isset($request->product_id))
            return redirect(route('products.index'));

        $product = $this->productRepo->find($request->product_id);

        return view('admin.product_variants.edit')
            ->with('product', $product)
            ->with('locations', $locations)
            ->with('productVariant', $productVariant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductVariantStoreRequest $request, $id)
    {
        $productVariant = $this->productVariantRepo->find($id);

        if (empty($productVariant)) {
            Flash::error('Product Variant not found');

            return redirect(route('productVariants.index'));
        }

        $dataUpdate = $request->all();

        $dataUpdate["slug"] = Str::slug($dataUpdate["name"]);

        $this->productVariantRepo->update($request->all(), $id);

        Flash::success('Product Variant updated successfully.');

        return redirect()->route('products.edit', [$productVariant->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productVariant = $this->productVariantRepo->find($id);
        if(empty($productVariant)){
            Flash::error('ProductVariant Variant not found');
            return redirect(route('productVariants.index'));
        }
        try{
            DB::beginTransaction();
            $this->productVariantRepo->delete($id);
            ProductAttributeValue::where("product_variant_id" , $id)->delete($id);
        }catch(\Exception $e){
            Log::error($e);
            Flash::error('ProductVariant not found');
            DB::rollBack();
        }
        Flash::success("sucess");
        return redirect(route('productVariants.index'));
    }
}
