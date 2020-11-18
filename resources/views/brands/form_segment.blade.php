<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Nova Segmento</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Segmento</a></li>
            <li class="active">Cadastrar Novo Segmento</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Cadastrar Novo Segmento
                        <span class="panel-subtitle">Cadastrar Novo Segmento para aparecer no Site</span>
                    </div>
                    <div class="panel-body">
                        @if($edit)
                            <form action="{{ route('brand.update.segment', ['id' => $segment->id]) }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                            @method('PUT')
                        @else
                            <form action="{{ route('brand.store.segment') }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">

                        @endif
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome</label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" id="name" placeholder="Nome Segmento" class="form-control" value="@if($edit) {{ $segment->name }} @endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status do Segmento</label>
                                <div class="col-sm-7">
                                    <div class="be-radio be-radio-color has-success inline">
                                        <input type="radio" @if($edit && $segment->status) checked @elseif(!$edit) checked @endif name="active" id="rad_active" class="radio_active">
                                        <label for="rad_active">Online</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline">
                                        <input type="radio" @if($edit && !$segment->status) checked @endif name="inactive" id="rad_inactive" class="radio_active">
                                        <label for="rad_inactive">Offline</label>
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
