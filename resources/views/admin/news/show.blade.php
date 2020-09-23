@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bookings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.news.fields.name')</th>
                            <td field-key='customer'>{{ $news->customer->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.news.fields.description')</th>
                            <td field-key='room'>{{ $news->room->room_number or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.news.fields.created_at')</th>
                            <td field-key='time_from'>{{ $news->time_from }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.news.fields.picture')</th>
                            <td field-key='time_to'>{{ $news->time_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.additional-information')</th>
                            <td field-key='additional_information'>{!! $news->additional_information !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.news.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
