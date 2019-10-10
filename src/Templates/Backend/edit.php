@extends('adminlte::page')

@section('title', 'Edit {{ $model }})


@section('content')
    <div class="row">
        <form name="db_form" role="form" action="{{ route('admin.edit{{ $model }}') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="bid" id="bid" value="{{ $post->id }}">
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
                    <div class="box-body">
                       
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{  $post->name }}">
                        </div>    

                        <br>
                        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>      
                    </div>
                </div>               
            </div>

            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Requirements</h3>
                    </div>
                    <div class="box-body">
                        
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