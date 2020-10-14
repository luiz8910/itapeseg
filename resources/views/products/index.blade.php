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
                                    <select class="form-control">
                                        <option value="" selected>Categoria</option>
                                        @foreach($categories as $category)
                                            @if($category->name == 'CFTV')
                                                <option value="{{ $category->id }}">{{ strtoupper($category->name) }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                            @endif
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
                                <tr>
                                    <td class="user-avatar"> <img src="assets/img/avatar6.png" alt="Avatar">{{ $product->name }}</td>
                                    <td>CFTV</td>
                                    <td><span class="label label-success">Disponivel</span></td>
                                    <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="user-avatar"> <img src="assets/img/avatar4.png" alt="Avatar">Haste de cerca eletrica</td>
                                <td>Cercas Perimetrais</td>
                                <td><span class="label label-success">Disponivel</span></td>
                                <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td class="user-avatar"> <img src="assets/img/avatar5.png" alt="Avatar">Roteador tp-link</td>
                                <td>Redes</td>
                                <td><span class="label label-danger">Em falta</span></td>
                                <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td class="user-avatar"> <img src="assets/img/avatar3.png" alt="Avatar">Bateria selada 12v 7a</td>
                                <td>Acessorios</td>
                                <td><span class="label label-success">Disponivel</span></td>
                                <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
