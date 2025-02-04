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
                            <li class="breadcrumb-item active">Categorías</li>
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

                        <form role="form" id='form_category' name='form_category'>
                            <input type='hidden' id='route' name='route' value="{{isset($category) ? route('category.update') : route('category.store')}}">
                            @method('POST')

                            @if(isset($category))
                                <input name="id" id="id" value="{{isset($category) ? $category->id : ''}}" type="hidden">
                            @endif

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos del registro</h3>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for='name'>Nombre *</label>
                                                <input type='text' id='name' name='name' class='form-control required' maxlength="100"
                                                       value="{{isset($category) ? $category->name : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for='icon'>Icono *</label>
                                                <input type='text' id='icon' name='icon' class='form-control required' maxlength="100"
                                                       value="{{isset($category) ? $category->icon : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Estatus *</label>
                                                <select class='form-control required tdtextarea' id='status' name='status'>
                                                    <option value="{{\App\Models\Category::STATUS_ACTIVE}}"
                                                            {{ (isset($category) and $category->status==\App\Models\Category::STATUS_ACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\Category::STATUS_ACTIVE}}
                                                    </option>
                                                    <option value={{\App\Models\Category::STATUS_INACTIVE}}
                                                            {{ (isset($category) and $category->status==\App\Models\Category::STATUS_INACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\Category::STATUS_INACTIVE}}
                                                    </option>
                                                </select>
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
                                    <a href="{{route('categories')}}" class="btn btn-secondary botones">Cancelar</a>
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
    @include('backend.functions.functions_category')
@endsection
