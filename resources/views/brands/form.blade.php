<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Nova Marca</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Marca</a></li>
            <li class="active">Cadastrar Nova Marca</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Cadastrar Nova Marca
                        <span class="panel-subtitle">Cadastrar Nova Marca para aparecer no site</span>
                    </div>
                    <div class="panel-body">
                        @if($edit)
                            <form action="{{ route('brand.update', ['id' => $brand->id]) }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="{{ route('brand.store') }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                        @endif

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Segmento</label>
                                <div class="col-sm-7">
                                    @foreach($segments as $seg)
                                        <div class="be-checkbox inline">

                                            <input id="{{ $seg->id }}" name="{{ $seg->id }}" type="checkbox"
                                                @if($edit)
                                                    @foreach($selected_seg as $select)
                                                        @if($select->segment_id == $seg->id) checked @endif
                                                    @endforeach
                                                @endif
                                            >
                                            <label for="{{ $seg->id }}">{{ $seg->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome da marca</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Nome Marca" id="name" name="name"
                                           class="form-control" value="@if($edit) {{ $brand->name }} @endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Upload</label>
                                <div class="col-sm-7">
                                    <input type="file" name="file" id="file" style="display:none;">
                                    <button class="btn btn-primary" id="upload" onclick="upload_view();">
                                        <i class="mdi mdi-cloud-upload"></i>
                                        Enviar Logotipo
                                    </button>

                                    <img id="preview_img" class="img-preview" src="@if($edit){{ str_replace('public', '/storage', $brand->picture) }}@endif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status do Produto</label>
                                <div class="col-sm-7">
                                    <div class="be-radio be-radio-color has-success inline">
                                        <input type="radio" @if($edit && $brand->status) checked @elseif(!$edit) checked @endif name="active" id="rad_active" class="radio_active">
                                        <label for="rad_active">Disponível</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline">
                                        <input type="radio" @if($edit && !$brand->status) checked @endif name="inactive" id="rad_inactive" class="radio_active">
                                        <label for="rad_inactive">Não disponível</label>
                                    </div>
                                </div>
                            </div> <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-7">
                                    <button type="submit" class="btn btn-rounded btn-space btn-success btn-lg">
                                        <i class="icon icon-left mdi mdi-check"></i>
                                        Salvar
                                    </button>
                                    <button class="btn btn-rounded btn-space btn-danger btn-lg">
                                        <i class="icon icon-left mdi mdi-arrow-back"></i>
                                        Voltar
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
