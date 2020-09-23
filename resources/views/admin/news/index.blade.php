@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">Articles</h3>

        <p>
            <a href="{{ route('admin.news.create') }}" class="btn btn-success">Ajouter un article</a>
        </p>

        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.news.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.news.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
        </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($news) > 0 ? 'datatable' : '' }} @can('news_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('news_delete')
                        @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                    @endcan

                    <th>Nom</th>
                    <th>description</th>
                    <th>image</th>
                    <th>créé le</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($news) > 0)
                    @foreach ($news as $new)
                        <tr data-entry-id="{{ $new->id }}">
                            <td field-key='title'>{{ $new->name }}</td>
                            <td field-key='room'>{{ $new->description }}</td>
                            <td field-key='time_from'>{{ $new->picture }}</td>
                            <td field-key='time_to'>{{ $new->created_at }}</td>
                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('news_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.news.restore', $customer->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('news_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.news.perma_del', $customer->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                        <a href="{{ route('admin.news.show',[$new->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                        <a href="{{ route('admin.news.edit',[$new->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.news.destroy', $new->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('news_delete')
                @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.news.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection