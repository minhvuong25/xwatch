@foreach ($products as $product)
    <div id="filtered-results" class="col-xl-4 col-lg-4 col-sm-4 col-6">
        <div class="bota_pr_item">
            <div class="bota_pr_image ">
                <a href="product_view.html" title="{{ $product->name }}">
                    <img width="320" height="365" class="lazy" alt="{{ $product->name }}"
                        src="{{ $product->default_img }}" />
                </a>
                <span class="bota_pr_installment">Trả góp 0%</span>
            </div>
            <h3 class="bota_pr_name">
                <a href="product_view.html" title="{{ $product->name }}">
                    {{ $product->name }}
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
