

<div class="row bota_product_grid">
    @foreach ($data as $product)
        <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
            <div class="bota_pr_item">
                <div class="bota_pr_image ">
                    <a href="{{ route('web.product.show', $product->slug) }}" title="">


                        @if ($product->images->first() === null)
                            <img src="" alt="donghothinhvuong.bota.vn">
                        @else
                            <img width="320px" height="365" alt="{{$product->name}}}"
                                src="{{ route('productImageShow', [
                                    'id' => $product->id,
                                    'fileName' => $product->images->first()->name ?? 'default.jpg',
                                ]) }}">
                        @endif
                    </a>
                    <span class="bota_pr_installment">Trả góp 0%</span>
                </div>
                <h3 class="bota_pr_name">
                    <a href="{{ route('web.product.show', $product->slug) }}" title="">
                        {{ $product->sku }}
                    </a>
                    <span class="bota_pr_cat_name">
                        {{ $product->name }}
                    </span>
                </h3>
                <div class="discount">
                @if (!empty($product->compare_price) && !empty($product->price) && $product->price < $product->compare_price)
                                        @php
                                            $discountPercentage = round((1 - ($product->price / $product->compare_price)) * 100);
                                        @endphp
                                        <span>- {{ $discountPercentage }}%</span>
                                    @endif
                </div>
                <div class="bota_pr_price_arae">
                    @if (!empty($product->compare_price))
                        <div class="bota_price_old">
                            {{ number_format($product->compare_price, 0, '.', '.') }}₫
                        </div>
                    @endif
                    @if (!empty($product->price))
                        <div class="bota_pr_price_current">
                            {{ number_format($product->price, 0, '.', '.') }}₫
                        </div>
                    @else
                        <p style="color: red">Liên hệ với chúng tôi!</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <!-- <div class="bota_pagination">
        <ul class="pagination">
            {{ $data->links() }}
        </ul>
    </div> -->