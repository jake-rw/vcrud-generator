@extends('adminlte::page')

@section('title', "{ $model }")

@push('css')
<style>
    .callout .btn {
        text-decoration: none;
    }
    .callout .pagination,
    .callout .table {
        vertical-align: middle;
        margin: 0;
    }
    .callout .table td {
        border: none;
        padding: 0;
    }
</style>
@endpush


@section('content')
    <div class="row">
        <section class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3>{{ $model }}s</h3>
                    <a href="{{ url('admin/{{ $route }}/export') }}" class="btn bg-light-blue">Export all {{ $model }}s</a>
                    <a href="{{ url('admin/{{ $route }}/create') }}" class="btn bg-green">Add new </a>
                    
                </div>
            </div>
            @if (Session::has('error'))
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                       {!! Session::get('error') !!}
                    </div>
                </div>
            @endif
        </section>
    </div>
    <div class="row">
        <div class="col-xs-12">
          
            <div class="box">
                <div class="box-body no-padding">
                    <table id="items" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5">&nbsp;</th>
                                <th>ID</th>                                                              
                                <th width="170">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td width="5">&nbsp;</td>
                                    <td>{{ $item->id }}</td>
                                                                       
                                    <td width="170">
                                        <ul class="list-unstyled list-inline">
                                            <li><a class="btn btn-default btn-sm" href="{{ url('admin/{{ $route }}/'.$item->id.'/edit') }}"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a class="btn btn-default btn-sm delete-item" href="{{ url('admin/{{ $route }}/delete/'.$item->id) }}"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.delete-item').on('click', function (e) {
                var answer = confirm("Are you sure?");
                if (answer !== true) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush