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
                            <li class="breadcrumb-item active">Quejas</li>
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

                        <form role="form" id='form_complaint' name='form_complaint'>
                            @method('POST')

                            @if(isset($complaint))
                                <input name="id" id="id" value="{{isset($complaint) ? $complaint->id : ''}}" type="hidden">
                            @endif

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos del registro</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for='title'>Título *</label>
                                                <input type='text' id='title' name='title' class='form-control required' maxlength="100"
                                                       value="{{isset($complaint) ? $complaint->title : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for='company_site'>Sitio web *</label>
                                                <input type='text' id='company_site' name='company_site' class='form-control required' maxlength="100"
                                                       value="{{isset($complaint) ? $complaint->company_site : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Empresas *</label>
                                                <select class='form-control  required tdtextarea' id='busine_id' name='busine_id'>
                                                    @foreach($busines AS $item)
                                                        <option value="{{$item->id}}">
                                                            {{ucwords(mb_strtolower($item->name))}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Estatus *</label>
                                                <select class='form-control required tdtextarea' id='status' name='status'>
                                                    <option value="{{\App\Models\Complaint::COMPLAINT_INACTIVE}}"
                                                        {{ (isset($complaint) and $complaint->status==\App\Models\Complaint::COMPLAINT_INACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\Complaint::COMPLAINT_INACTIVE}}
                                                    </option>
                                                    <option value={{\App\Models\Complaint::COMPLAINT_ACTIVE}}
                                                        {{ (isset($complaint) and $complaint->status==\App\Models\Complaint::COMPLAINT_ACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\Complaint::COMPLAINT_ACTIVE}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>País *</label>
                                                <select class='form-control  required tdtextarea' id='country_id' name='country_id'>
                                                    @foreach($countries AS $item)
                                                        <option value="{{$item->id}}">
                                                            {{ucwords(mb_strtolower($item->name))}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for='name'>Estado *</label>
                                                <input type='text' id='company_site' name='company_site' class='form-control required' maxlength="100"
                                                       value="{{isset($complaint) ? $complaint->state : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Descripción *</label>
                                                <textarea class='form-control required tdtextarea' id='description' name='description' style="height: 200px">{{isset($complaint) ? $complaint->description : ''}}</textarea>
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
                                    <a href="{{route('reports_complaint.index')}}" class="btn btn-secondary botones">Cancelar</a>
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
    @include('backend.functions.functions_complaint')
@endsection
