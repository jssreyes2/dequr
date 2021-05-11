@extends('backend.layouts.master')@section('content')    <div class="content-wrapper">        <!-- Content Header (Page header) -->        <div class="content-header">            <div class="container-fluid">                <div class="row mb-2">                    <div class="col-sm-6">                        <h1 class="m-0 text-dark">Dashboard</h1>                    </div><!-- /.col -->                    <div class="col-sm-6">                        <ol class="breadcrumb float-sm-right">                            <li class="breadcrumb-item"><a href="{{route('backend')}}">Inicio</a></li>                            <li class="breadcrumb-item active">Men&uacute;</li>                        </ol>                    </div><!-- /.col -->                </div><!-- /.row -->            </div><!-- /.container-fluid -->        </div>        <!-- /.content-header -->        <!-- Main content -->        <section class="content">            <div class="container-fluid">                <div class="row">                    <div class="col-12">                        <form role="form" id='form_menu' name='form_menu'>                            <input type='hidden' id='ruta' name='ruta' value="{{isset($data) ? 'update' : 'store'}}">                            @method('POST')                            @if(isset($data))                                <input name="id" id="id" value="{{isset($data) ? $data->id : ''}}" type="hidden">                                <input name="position" id="position" value="{{isset($data) ? $data->position : ''}}" type="hidden">                            @endif                            <div class="card card-secondary">                                <div class="card-header">                                    <h3 class="card-title">Datos del registro</h3>                                </div>                                <div class="card-body">                                    <div class="row">                                        <div class="col-sm-4">                                            <div class="form-group">                                                <label>Tipo *</label>                                                <select class='form-control required tdtextarea' id='tipo' name='tipo' onchange="mostrarSubdirectorios(this.value)">                                                    <option value=" ">                                                        {{'Seleccione...'}}                                                    </option>                                                    <option value="1" {{ (isset($data) and $data['enabled']==true) ?'selected' : ''}}>                                                        {{'DIRECTORIO'}}                                                    </option>                                                    <option value="2" {{ (isset($data) and $data['enabled']==false) ?'selected' : ''}}>                                                        {{'SUB DIRECTORIO'}}                                                    </option>                                                </select>                                            </div>                                        </div>                                        <div class="col-sm-4" id="selectSubMenu" style="display: none">                                            <label for='id_submenu'>Sub Directorios *</label>                                            <select class='form-control required tdtextarea' id='id_submenu' name='id_submenu'>                                                @foreach($subMenu AS $item)                                                    @php($idmenu=((isset($data) ? $data->id:null)))                                                    @if($idmenu!=$item['id'])                                                        <option value="{{$item['id']}}" {{ (isset($data) and $item['id']==$data->id) ?'selected' : ''}}>                                                            {{$item['name']}}                                                        </option>                                                    @endif                                                @endforeach                                            </select>                                        </div>                                        <div class="col-sm-4">                                            <div class="form-group">                                                <label>Nombre *</label>                                                <input type='text' id='name' name='name' class='form-control required' maxlength="150" value="{{isset($data) ? $data->name : ''}}">                                            </div>                                        </div>                                        <div class="col-sm-4" id="div_icono">                                            <div class="form-group">                                                <label>Icono *</label>                                                <input type='text' id='icono' name='icono' class='form-control required' maxlength="150"                                                       value="{{isset($data) ? $data->icono : ''}}">                                            </div>                                        </div>                                        <div class="col-sm-4">                                            <div class="form-group">                                                <label>Ruta</label>                                                <input type='text' id='slug' name='slug' class='form-control' maxlength="150"                                                       value="{{isset($data) ? $data->slug : ''}}">                                            </div>                                        </div>                                        <div class="col-sm-4">                                            <div class="form-group">                                                <label>Estatus *</label>                                                <select class='form-control required tdtextarea' id='enabled' name='enabled'>                                                    <option value="{{true}}" {{ (isset($data) and $data['enabled']==true) ?'selected' : ''}}>                                                        {{'ACTIVO'}}                                                    </option>                                                    <option value="{{false}}" {{ (isset($data) and $data['enabled']==false) ?'selected' : ''}}>                                                        {{'INACTIVO'}}                                                    </option>                                                </select>                                            </div>                                        </div>                                        <div class="form-group col-sm-12" id='loading' style='display: none; text-align: center;'>                                            <img src='{{asset('asset/dashboard/img/loadingfrm.gif')}}'/>                                        </div>                                    </div>                                </div>                                <div class="card-footer">                                    <p>Campos Requeridos (*)</p>                                    <button type="submit" class="btn btn-success botones">Guardar</button>                                    <a href="{{route('menu')}}" class="btn btn-secondary botones">Cancelar</a>                                </div>                            </div>                        </form>                    </div>                </div>                <!-- /.row -->            </div><!-- /.container-fluid -->        </section>        <!-- /.content -->    </div>    @include('backend.functions.functions_menu')@endsection