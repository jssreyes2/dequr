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
                            <li class="breadcrumb-item"><a href="{{route('backend')}}">Home</a></li>
                            <li class="breadcrumb-item active">Páginas estáticas</li>
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

                        <form role="form" id='form-static-page' name='form-static-page'>
                            <input type='hidden' id='ruta' name='ruta' value="{{isset($data) ? 'update' : 'store'}}">
                            @method('POST')

                            @if(isset($data))
                                <input name="id" id="id" value="{{isset($data) ? $data->id : ''}}" type="hidden">
                            @endif

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos del registro</h3>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for='title'>Titulo *</label>
                                                <input type='text' id='title' name='title' class='form-control required' maxlength="100"
                                                       value="{{isset($data) ? $data->title : ''}}" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Estatus *</label>
                                                <select class='form-control required tdtextarea' id='status' name='status'>
                                                    <option value="{{\App\Models\StaticPage::STATIC_PAGE_ACTIVE}}"
                                                            {{ (isset($data) and $data->status==\App\Models\StaticPage::STATIC_PAGE_ACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\StaticPage::STATIC_PAGE_ACTIVE}}
                                                    </option>

                                                    <option value="{{\App\Models\StaticPage::STATIC_PAGE_INACTIVE}}"
                                                            {{ (isset($data) and $data->status==\App\Models\StaticPage::STATIC_PAGE_INACTIVE) ?'selected' : ''}}>
                                                        {{\App\Models\StaticPage::STATIC_PAGE_INACTIVE}}
                                                    </option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Página *</label>
                                                <select class='form-control required tdtextarea' id='page' name='page'>
                                                    <option value="{{\App\Models\StaticPage::TERMS_AND_CONDITIONS}}"
                                                            {{ (isset($data) and $data->page==\App\Models\StaticPage::TERMS_AND_CONDITIONS) ?'selected' : ''}}>
                                                        {{\App\Models\StaticPage::TERMS_AND_CONDITIONS}}
                                                    </option>

                                                    <option value="{{\App\Models\StaticPage::LEGAL}}"
                                                            {{ (isset($data) and $data->page==\App\Models\StaticPage::LEGAL) ?'selected' : ''}}>
                                                        {{\App\Models\StaticPage::LEGAL}}
                                                    </option>

                                                    <option value="{{\App\Models\StaticPage::COOKIES}}"
                                                            {{ (isset($data) and $data->page==\App\Models\StaticPage::COOKIES) ?'selected' : ''}}>
                                                        {{\App\Models\StaticPage::COOKIES}}
                                                    </option>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for='body'>Contenido *</label>
                                                <textarea class="textarea" id="body" name="body">{{isset($data) ? $data->body : ''}}</textarea>
                                            </div>
                                        </div>


                                        <div class="form-group col-sm-12" id='loading' style='display: none; text-align: center;'>
                                            <img src='{{URL::asset('asset/backend/img/loadingfrm.gif')}}'/>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p>Campos Requeridos (*)</p>
                                    <button type="submit" class="btn btn-success btn-frm">Guardar</button>
                                    <a href="{{route('static_page.index')}}" class="btn btn-secondary btn-frm">Cancelar</a>
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
    @include('backend.functions.functions_static_page')
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote({
                height: 300,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                }
            });
        });
    </script>
@endsection
