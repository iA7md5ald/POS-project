@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.products')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.products.index')}}"> @lang('site.products')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section><!-- end of header section -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">
                    @include('partials._errors')
                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')


                        <div class="form-group">
                            <label for="">@lang('site.categories')</label>
                            <select name="category_id" id="" class="form-control" >
                                <option value="">@lang('site.all_categories')</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach(config('translatable.locales') as $locale)
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.name')</label>
                                <input type="text" name="{{$locale}}[name]" class="form-control" value="{{ old($locale . '.name') }}" >
                            </div>
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.description')</label>
                                <textarea name="{{$locale}}[description]" class="form-control ckeditor">{{ old($locale . '.description') }}</textarea>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image" >
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/products_image/default.png') }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.purchase_price')</label>
                            <input type="number" name="purchase_price" class="form-control" value="{{ old('purchase_price') }}" >
                        </div>

                        <div class="form-group">
                            <label>@lang('site.sale_price')</label>
                            <input type="number" name="sale_price" class="form-control" value="{{ old('sale_price') }}" >
                        </div>

                        <div class="form-group">
                            <label>@lang('site.stock')</label>
                            <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" >
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->
                </div><!-- end of box body -->
            </div>
        </section><!-- end of content section -->
    </div><!-- end of wrapper -->
@endsection

@push('scripts')

{{--        <script>--}}

{{--            //line chart--}}
{{--            var line = new Morris.Line({--}}
{{--                element: 'line-chart',--}}
{{--                resize: true,--}}
{{--                data: [--}}
{{--                        @foreach ($sales_data as $data)--}}
{{--                    {--}}
{{--                        ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"--}}
{{--                    },--}}
{{--                    @endforeach--}}
{{--                ],--}}
{{--                xkey: 'ym',--}}
{{--                ykeys: ['sum'],--}}
{{--                labels: ['@lang('site.total')'],--}}
{{--                lineWidth: 2,--}}
{{--                hideHover: 'auto',--}}
{{--                gridStrokeWidth: 0.4,--}}
{{--                pointSize: 4,--}}
{{--                gridTextFamily: 'Open Sans',--}}
{{--                gridTextSize: 10--}}
{{--            });--}}
{{--        </script>--}}

@endpush