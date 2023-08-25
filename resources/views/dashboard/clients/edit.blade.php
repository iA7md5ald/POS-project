@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.clients')</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>
                </li>
                <li><a href="{{route('dashboard.clients.index')}}"> @lang('site.clients')</a></li>
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
                    <form action="{{ route('dashboard.clients.update', $client->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                        </div>

                        @for($i=0 ; $i < 2 ; $i++)

                            <div class="form-group">
                                <label>@lang('site.phone')</label>
                                <input type="text" name="phone[]" class="form-control" value="{{ $client->phone[$i] }}">
                            </div>
                        @endfor

                        <div class="form-group">
                            <label>@lang('site.address')</label>
                            <textarea name="address" class="form-control"> {{ $client->address }} </textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')
                            </button>
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
