@extends('web.layouts.master')
@section('title')
{{$seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng'}}
@stop
@php
    $googleAnalyticsCode = \App\Models\Setting::where('key', 'google_analytics_code')->first()->value ?? '';
@endphp
@section('meta')
      <meta name="description" content="{{$seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta name="keywords" content="{{$seoContent->meta_keyword ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta property="name" content="{{$seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta property="description" content="{{$seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta property="og:title" content="{{$seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta property="og:description" content="{{$seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng'}}">
  
@stop
<!-- Google Analytics -->
@if(!empty($googleAnalyticsCode))
    {!! $googleAnalyticsCode !!}
@endif
@section('content')
      
      <div class="bota_body_main">

         <div class="bota_body_center">
            <div class="bota_breadcrumb_main">
               <div class="container">
                  <ul class="breadcrumb">
                     <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                     <li><a href="{{ route('web.blogCategory.show', $value['slug'] = 'tin-tuc') }}" title="Tin tức">Tin
                        tức</a></li>
                     <li><a href="news.html" title="Kiến thức đồng hồ"></a></li>
                  </ul>
               </div>
            </div>
            <div class="bota_news_page">
               <div class="container">
                
                 
                  <div class="bota_news_page_bottom">
                     <div class="row">
                        <div class="col-xl-8 col-lg-8 col-sm-8">
                           <div class="bota_list_news_left">
                              @foreach ($data as $data)
                              <div class="bota_list_left_item clearfix">
                                 <figure class="bota_list_left_img">
                                    <a class="item-img" href="{{$data->link_video}}">
                                    <img class="lazy" alt="avb?"  width="200"
                                    src="{!! asset('uploads/customer/'.$data->video_image) !!}">
                                    </a>
                                 </figure>
                                 <div class="bota_list_left_right">
                                    <h2 class="title"><a href="{{$data->link_name ?? ''}}" title="32">{{$data->customer_name}}</a></h2>
                               
                                    <div class="sum">
                                       {{$data->description}}
                                    </div>
                                
                                 </div>
                              </div>
                              @endforeach


                              
                           </div>
                     
                        </div>
                    
                     </div>
                  </div>
               </div>
            </div>
        
            
         </div>
         
 @stop
   