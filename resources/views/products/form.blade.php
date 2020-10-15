<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Novo Produto</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Produtos</a></li>
            <li class="active">Cadastrar Novo</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">
                        Cadastrar Novo Produto
                        {{--<span class="panel-subtitle">Cadastrar Novo produto para aparecer no catalago</span>--}}
                    </div>
                    <div class="panel-body">
                        @if($edit)
                            <form id="form" action="{{ route('product.update', ['id' => $product->id]) }}"
                                  method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">
                            @method('PUT')

                            <input type="hidden" value="{{ $product->id }}" id="product_id">
                        @else
                            <form id="form" action="{{ route('product.store') }}"
                                  method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed" enctype="multipart/form-data">

                        @endif
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Categoria</label>
                                <div class="col-sm-7">
                                    <input type="hidden" name="category_id" id="category_id" value="@if($edit){{ $product->category_id }}@endif">
                                    @foreach($categories as $category)
                                        @if($category->status)
                                            <div class="be-radio inline">
                                                <input type="radio" disabled class="radio" id="rad_{{ $category->id }}"
                                                       @if($edit && $category->id == $product->category_id) checked @endif>
                                                <label for="rad_{{ $category->id }}">{{ $category->name }}</label>
                                            </div>
                                        @else
                                            <div class="be-radio inline">
                                                <input type="radio" disabled class="radio" id="rad_{{ $category->id }}" disabled>
                                                <label for="rad_{{ $category->id }}">{{ $category->name }}</label>
                                            </div>
                                        @endif

                                    @endforeach
                                    {{--<div class="be-radio inline">
                                        <input type="radio" class="radio" name="rad10" id="rad2">
                                        <label for="rad2">Alarme</label>
                                    </div>
                                    <div class="be-radio inline">
                                        <input type="radio" class="radio" name="rad10" id="rad3">
                                        <label for="rad3">Cercas</label>
                                    </div>
                                    <div class="be-radio inline">
                                        <input type="radio" class="radio" name="rad10" id="rad4">
                                        <label for="rad4">Informática</label>
                                    </div>
                                    <div class="be-radio inline">
                                        <input type="radio" class="radio" name="rad10" id="rad5">
                                        <label for="rad5">Eletrica</label>
                                    </div>
                                    <div class="be-radio inline">
                                        <input type="radio" class="radio" name="rad10" id="rad6">
                                        <label for="rad6">Acessorios</label>
                                    </div>--}}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Subcategoria</label>
                                <div class="col-sm-7">
                                    <div class="be-checkbox inline">
                                        <input id="check1" type="checkbox">
                                        <label for="check1">1MP</label>
                                    </div>
                                    <div class="be-checkbox inline">
                                        <input id="check2" type="checkbox">
                                        <label for="check2">IP</label>
                                    </div>
                                    <div class="be-checkbox inline">
                                        <input id="check3" type="checkbox">
                                        <label for="check3">2mp</label>
                                    </div>
                                    <div class="be-checkbox inline">
                                        <input id="check4" type="checkbox">
                                        <label for="check4">WIFI</label>
                                    </div>
                                    <div class="be-checkbox inline">
                                        <input id="check5" type="checkbox">
                                        <label for="check5">DVR</label>
                                    </div>
                                    <div class="be-checkbox inline">
                                        <input id="check6" type="checkbox">
                                        <label for="check6">HVR</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Nome Produto" id="name"
                                           name="name" class="form-control" value="@if($edit){{ $product->name }}@endif" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cod (SKU)</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Seu codigo do produto" id="code" name="code"
                                           class="form-control" value="@if($edit){{ $product->code }}@endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Marca</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Marca Produto" class="form-control"
                                           value="@if($edit){{ $product->brand }}@endif" id="brand" name="brand">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Modelo</label>
                                <div class="col-sm-7">
                                    <input type="text" placeholder="Modelo Produto" value="@if($edit){{ $product->model }}@endif"
                                           class="form-control" id="model" name="model">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Observação</label>
                                <div class="col-sm-7">
                                    <textarea placeholder="Digite aqui informações importantes sobre o produto"
                                              name="description" id="description" cols="30" rows="10" class="form-control"
                                    >@if($edit){{ $product->description }}@endif</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Status do Produto</label>
                                <div class="col-sm-7">
                                    <div class="be-radio be-radio-color has-success inline">
                                        <input type="radio" @if($edit && $product->status) checked @elseif(!$edit) checked @endif name="active" id="rad34">
                                        <label for="rad34">Disponivel</label>
                                    </div>
                                    <div class="be-radio be-radio-color has-danger inline">
                                        <input type="radio" @if($edit && !$product->status) checked @endif name="inactive" id="rad36">
                                        <label for="rad36">Em falta</label>
                                    </div>
                                </div>
                            </div> <br><br><br>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-7">
                                    <button type="submit" class="btn btn-rounded btn-space btn-success btn-lg"
                                            {{--@if($edit)onclick="add_update({!! $product->id !!})" @else onclick="add_update()"@endif--}}>
                                        <i class="icon icon-left mdi mdi-check"></i>
                                        Salvar
                                    </button>
                                    <button class="btn btn-rounded btn-space btn-danger btn-lg">
                                        <i class="icon icon-left mdi mdi-alert-circle"></i>
                                        Limpar
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
