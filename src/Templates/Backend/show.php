@extends('adminlte::page')

@section('title', "Edit { $model }")


@section('content')
    <div class="row">
        <form name="db_form" role="form">
            <input type="hidden" name="bid" id="bid" value="{{ $item->id }}">
            @if(!empty($errors->all()))
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <span>{{ $error }}</span><br />
                        @endforeach
                    </div>
                </div>
            @endif
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Details</h3>
                    </div> 
                    <div class="box-body">                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{  $item->name }}" disabled="">
                        </div>      
                    </div>
                </div>               
            </div>
            
        </form>
    </div>
    
@stop

@push('js')
    <script src="/vendor/adminlte/dist/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            autoclose: true,
            orientation: 'bottom',
            format: 'dd/mm/yyyy'
        })
    </script>
@endpush