<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body xs-pb-10">
                        <form action="#" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-xs-6 col-md-6">
                                    <select class="form-control" id="category_select_sub">
                                        <option value="" selected>Escolha uma opção</option>
                                        <option value="0">Todas</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if(!$category->status) disabled @endif>
                                                {{ ucfirst($category->name) }}
                                            </option>

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
                    <div class="panel-heading">
                        <div class="title">SubCategoria</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:37%;">Nome SubCategoria</th>
                                <th>Categoria Pai</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($sub as $s)
                                    <tr id="model_{{ $s->id }}">
                                        <td class="user-avatar">
                                            <a href="{{ route('product.edit.category.sub', ['id' => $s->id]) }}" style="color: #0b0b0b;">
                                                {{ ucfirst($s->name) }}
                                            </a>
                                        </td>
                                        <td>{{ $s->category_name }}</td>
                                        <td>
                                            @if($s->status)
                                                <span class="label label-success">Online</span>
                                            @else
                                                <span class="label label-danger">Offline</span>
                                            @endif
                                        </td>
                                        <td class="actions">
                                            <a href="{{ route('product.edit.category.sub', ['id' => $s->id]) }}" class="icon">
                                                <i class="mdi mdi-edit"></i>
                                            </a>
                                            @if(isset($deleted))
                                                <a href="javascript:" class="icon" onclick="activate_category_sub({!! $s->id !!})">
                                                    <i class="mdi mdi-long-arrow-up" style="margin-left: 10px;"></i>
                                                </a>
                                            @else
                                                <a href="javascript:" class="icon" onclick="destroy_category_sub({!! $s->id !!})">
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
