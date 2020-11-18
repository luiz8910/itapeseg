<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Todos as Marcas</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Marcas</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body xs-pb-10">

                        <div class="form-group">
                            <div class="col-xs-6 col-md-6">
                                <select class="form-control" id="segment_id">
                                    <option value="" selected>Escolha um Segmento</option>
                                    @foreach($segments as $seg)
                                        <option value="{{ $seg->id }}" @if($orderBy && $orderBy == $seg->id) selected @endif>{{ $seg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-3 col-md-6 pull-right">
                                <select class="form-control" id="status">
                                    <option value="" @if(!$status) selected @endif>Filtrar por Status</option>
                                    <option value="disponivel" @if($status == "disponivel") selected @endif>Disponível</option>
                                    <option value="falta" @if($status == "falta") selected @endif>Não Disponível</option>
                                </select>
                                {{--<div class="input-group input-search">
                                    <input type="text" placeholder="Pesquisar Produto" class="form-control">
                                    <span class="input-group-btn">
                                                <button class="btn btn-default">
                                                    <i class="icon mdi mdi-search"></i>
                                                </button>
                                            </span>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading ">
                        <div class="tools"></div>
                        <div class="title">Marca</div>
                    </div>

                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:37%;">Nome </th>
                                <th style="width:36%;">Segmento</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $b)
                                <tr id="model_{{ $b->id }}">

                                    <td class="user-avatar">
                                        @if($b->picture)
                                            <img src="{{ str_replace('public', '/storage', $b->picture) }}" alt="Avatar">
                                        @else
                                            <img src="../../noimage.png" alt="Avatar">
                                        @endif

                                        <a href="{{ route('brand.edit', ['id' => $b->id]) }}" style="color: #0b0b0b;"> {{ $b->name }}</a>
                                    </td>

                                    <td>
                                        @if(count($b->segments) > 1)
                                            <?php $i = 0; ?>
                                            @foreach($b->segments as $seg)
                                                @if($i == count($b->segments) - 1)
                                                    {{ $seg->name}}
                                                @else
                                                    {{ $seg->name . ', '}}
                                                @endif
                                            <?php $i++; ?>
                                            @endforeach
                                        @else
                                            {{ isset($b->segments[0]->name) ? $b->segments[0]->name : 'Sem segmento' }}
                                        @endif

                                    </td>
                                    <td>
                                        @if($b->status)
                                            <span class="label label-success">Disponivel</span>
                                        @else
                                            <span class="label label-danger">Não Disponível</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('brand.edit', ['id' => $b->id]) }}" class="icon">
                                            <i class="mdi mdi-edit"></i>
                                        </a>
                                        <a href="javascript:" class="icon" onclick="destroy({!! $b->id !!});" style="margin-left: 10px;">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
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
