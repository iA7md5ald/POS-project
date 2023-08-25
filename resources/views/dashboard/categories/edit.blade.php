@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.categories')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.categories.index')}}"> @lang('site.categories')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section><!-- end of header section -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->
                <div class="box-body">
                    @include('partials._errors')
                    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('put')

                        @foreach(config('translatable.locales') as $locale)

                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.name')</label>
                                <input type="text" name="{{$locale}}[name]" class="form-control" value="{{ $category->translate($locale)->name}}">
                            </div>

                        @endforeach


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
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
