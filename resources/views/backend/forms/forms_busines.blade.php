@extends('backend.layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Empresas</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <form role="form" id='form_busines' name='form_busines'>
                            <input type='hidden' id='route' name='route' value="{{isset($busines) ? route('busines.update') : route('busines.store')}}">
                            @method('POST')

                            @if(isset($busines))
                                <input name="id" id="id" value="{{isset($busines) ? $busines->id : ''}}" type="hidden">
                            @endif

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos del registro</h3>
                                </div>
                                <div class="card-body">

                                    <div class="row">

                                        @if(isset($busines)  and !empty($busines->logo))
                                            <img src="{{ asset('storage/photo_busines/' .$busines->logo)}}" class="img-circle elevation-2" alt="{{$busines->logo}}"
                                                 style=" margin: auto" id="logo-busines">
                                        @endif

                                        <div id="uploadForm"></div>
                                        <div class="col-sm-12" style="padding-bottom: 20px; padding-top: 20px; text-align: center">
                                            <label for="imageUpload" class="btn btn-primary"
                                                   onclick="document.getElementById('photo').click()">Seleccionar foto (jpg, jpeg)</label>
                                            <input type="file" id="photo" name="photo" accept="image/jpg, image/jpeg" style="display: none">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for='name'>Nombre *</label>
                                                <input type='text' id='name' name='name' class='form-control required' maxlength="100"
                                                       value="{{isset($busines) ? $busines->name : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Estatus *</label>
                                                <select class='form-control required tdtextarea' id='status' name='status'>
                                                    <option value="{{\App\Models\Busines::STATUS_ACTIVE}}"
                                                        {{ (isset($busines) and $busines->status==\App\Models\Busines::STATUS_ACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\Busines::STATUS_ACTIVE}}
                                                    </option>
                                                    <option value={{\App\Models\Busines::STATUS_INACTIVE}}
                                                        {{ (isset($busines) and $busines->status==\App\Models\Busines::STATUS_INACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\Busines::STATUS_INACTIVE}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Descripción *</label>
                                                <textarea class='form-control required tdtextarea' id='description' name='description'>{{isset($busines) ?
                                                $busines->description : ''}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12" id='loading' style='display: none; text-align: center;'>
                                            <img src='{{URL::asset('asset/backend/img/loadingfrm.gif')}}'/>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p>Campos Requeridos (*)</p>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a href="{{route('business')}}" class="btn btn-secondary botones">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @include('backend.functions.functions_busines')
@endsection
