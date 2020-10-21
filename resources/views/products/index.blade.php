<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Todos os Produtos</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Produtos</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body xs-pb-10">
                        <form action="#" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-xs-6 col-md-6">
                                    <select class="form-control" id="category_select">
                                        <option value="" selected>Categoria</option>
                                        <option value="0">Todas</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(!$category->status) disabled @endif>{{ ucfirst($category->name) }}</option>

                                        @endforeach
                                        {{--<option value="1" selected="">Categoria</option>
                                        <option value="2">CFTV</option>
                                        <option value="3">Cercas</option>
                                        <option value="4">Informaica</option>
                                        <option value="5">Eletrica</option>--}}
                                    </select>
                                </div>
                                <div class="col-xs-3 col-md-6 pull-right">
                                    <div class="input-group input-search">
                                        <input type="text" placeholder="Pesquisar Produto" class="form-control"><span class="input-group-btn">
                                                    <button class="btn btn-default"><i class="icon mdi mdi-search"></i></button></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading ">
                        <div class="tools"></div>
                        <div class="title">Produtos</div>
                    </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:37%;">Nome Produto</th>
                                <th style="width:36%;">Categoria</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr id="model_{{ $product->id }}">

                                    <td class="user-avatar">
                                        @if($product->picture)
                                            <img src="{{ str_replace('public', '/storage', $product->picture) }}" alt="Avatar">
                                        @else
                                            <img src="noimage.png" alt="Avatar">
                                        @endif
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}" style="color: #0b0b0b;">
                                            {{ $product->name }}
                                        </a>
                                    </td>

                                    <td>{{ $product->category_name }}</td>

                                    <td><span class="label label-success">Disponivel</span></td>

                                    <td class="actions">
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="icon">
                                            <i class="mdi mdi-edit"></i>
                                        </a>
                                        @if(isset($deleted))
                                            <a href="javascript:" class="icon" onclick="activate({!! $product->id !!})" title="Reativar Produto">
                                                <i class="mdi mdi-long-arrow-up" style="margin-left: 10px;"></i>
                                            </a>
                                        @else
                                        <a href="javascript:" class="icon" onclick="destroy({!! $product->id !!})" title="Excluir produto">
                                            <i class="mdi mdi-delete" style="margin-left: 10px;"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
