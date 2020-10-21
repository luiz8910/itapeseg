<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="title">Categoria</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Imagem</th>
                                <th style="width:37%;">Nome Categoria</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr id="model_{{ $category->id }}">
                                    <td class="user-avatar">
                                        @if($category->picture)
                                            <img src="{{ str_replace('public', '/storage', $category->picture) }}" alt="Avatar">
                                        @else
                                            <img src="noimage.png" alt="Avatar">
                                        @endif
                                        <a href="{{ route('product.edit.category', ['id' => $category->id]) }}" style="color: #0b0b0b;">
                                            {{ $category->name }}
                                        </a>
                                    </td>
                                    <td class="user-avatar">{{ ucfirst($category->name) }}</td>
                                    <td>
                                        @if($category->status)
                                            <span class="label label-success">Online</span>
                                        @else
                                            <span class="label label-danger">Offline</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('product.edit.category', ['id' => $category->id]) }}" class="icon">
                                            <i class="mdi mdi-edit"></i>
                                        </a>
                                        @if(isset($deleted))
                                            <a href="javascript:" class="icon" onclick="activate_category({!! $category->id !!})">
                                                <i class="mdi mdi-long-arrow-up" style="margin-left: 10px;"></i>
                                            </a>
                                        @else
                                            <a href="javascript:" class="icon" onclick="destroy_category({!! $category->id !!})">
                                                <i class="mdi mdi-delete" style="margin-left: 10px;"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            {{--<tr>
                                <td class="user-avatar">Alarme</td>
                                <td>5</td>
                                <td><span class="label label-success">Online</span></td>
                                <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td class="user-avatar">Cercas Perimetrais</td>
                                <td>25</td>
                                <td><span class="label label-danger">Offline</span></td>
                                <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td class="user-avatar">Eletrica</td>
                                <td>30</td>
                                <td><span class="label label-success">Online</span></td>
                                <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td class="user-avatar">Acessorios</td>
                                <td>58</td>
                                <td><span class="label label-danger">Offline</span></td>
                                <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                            </tr>
                            <tr>
                                <td class="user-avatar">Informatica</td>
                                <td>5</td>
                                <td><span class="label label-success">Online</span></td>
                                <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
