<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">@if($edit)Alterar Categoria {{ $category->name }} @else Nova Categoria @endif</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Categoria</a></li>
            <li class="active">@if($edit)Alterar Categoria {{ $category->name }} @else Nova Categoria @endif</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        @if($edit)Alterar Categoria {{ $category->name }} @else Cadastrar Nova Categoria @endif
                    </div>
                    <div class="panel-body">
                        @if($edit)
                            <form action="{{ route('product.update.category', ['id' => $category->id]) }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                            @method('PUT')
                        @else
                            <form action="{{ route('product.store.category') }}" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                        @endif

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Nome da Categoria" class="form-control"
                                           name="name" id="name" value="@if($edit){{ $category->name }}@endif" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status da Categoria</label>
                                <div class="col-sm-7">
                                    <div class="be-radio be-radio-color has-success inline">
                                        <input type="radio" class="radio_active" @if($edit && $category->active) checked @elseif(!$edit) checked @endif name="active" id="rad_active">
                                        <label for="rad_active">Online</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline">
                                        <input type="radio" class="radio_active" @if($edit && !$category->active) checked @endif name="inactive" id="rad_inactive">
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
