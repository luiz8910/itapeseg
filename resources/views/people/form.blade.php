<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">@if($edit) Alterar Usuário "{{ $person->name }}" @else Novo Usuário @endif</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Usuário</a></li>
            <li class="active">@if($edit) Alterar Usuário "{{ $person->name }}" @else Cadastrar Novo @endif</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        @if($edit) Alterar Usuário "{{ $person->name }}" @else Cadastrar Novo Usuário @endif
                        <span class="panel-subtitle">@if($edit) Alterar Usuário "{{ $person->name }}" @else Cadastrar Novo Usuário @endif</span>
                    </div>
                    <div class="panel-body">
                        @if($edit)
                            <form action="{{ route('person.update', ['id'=> $person->id]) }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                            @method('PUT')
                        @else
                            <form action="{{ route('person.store') }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                        @endif
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome Usuario*</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Nome Usuario" class="form-control"
                                           id="name" name="name" value="@if($edit){{ $person->name }}@endif" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email*</label>
                                <div class="col-sm-7">
                                    <input type="email" placeholder="Seu Email" class="form-control" name="email" id="email"
                                           value="@if($edit){{ $person->user->email }}@endif" required>
                                </div>
                            </div>
                            {{--<div class="form-group">
                                <label class="col-sm-3 control-label">Senha*</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Digite sua senha" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirmar Senha*</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Confirme sua senha" class="form-control">
                                </div>
                            </div>--}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cargo*</label>
                                <div class="col-sm-7">
                                    <select class="form-control" required>
                                        <option value="">Selecione</option>
                                        <option value="Admin" selected>Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status do Usuário</label>
                                <div class="col-sm-7">
                                    <div class="be-radio be-radio-color has-success inline">
                                        <input type="radio" class="radio_active" name="active" id="rad_active" @if($edit && $person->status) checked @elseif(!$edit) checked @endif>
                                        <label for="rad_active">Disponível</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline">
                                        <input type="radio" class="radio_active" name="inactive" id="rad_inactive" @if($edit && !$person->status) checked @endif>
                                        <label for="rad_inactive">Bloqueado</label>
                                    </div>
                                </div>
                            </div> <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-7">
                                    <div class="progress" style="display:none;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated active"
                                             role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 100%; font-size: 18px;">Criando seu usuário...
                                        </div>
                                    </div>
                                    <button type="submit" id="btn_submit" class="btn btn-rounded btn-space btn-success btn-lg">
                                        <i class="icon icon-left mdi mdi-check"></i>
                                        Salvar
                                    </button>
                                    <button type="button" id="btn_cancel" class="btn btn-rounded btn-space btn-danger btn-lg">
                                        <i class="icon icon-left mdi mdi-alert-circle"></i>
                                        Cancelar
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
