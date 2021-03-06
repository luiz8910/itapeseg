<div class="be-content">
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default panel-table">
                    <div class="panel-heading">
                        <div class="title">Segmento</div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th style="width:37%;">Nome Segmento</th>
                                <th style="width:36%;">Qtd de Marcas</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($segments as $segment)
                                <tr>
                                    <td class="user-avatar">
                                        <a href="{{ route('brand.edit.segment', ['id' => $segment->id]) }}" style="color: #0b0b0b">{{ $segment->name }}</a>
                                    </td>
                                    <td>{{ $segment->count }}</td>
                                    <td>
                                        @if($segment->status)
                                            <span class="label label-success">Online</span>
                                        @else
                                            <span class="label label-danger">Offline</span>
                                        @endif
                                    </td>
                                    <td class="actions">
                                        <a href="{{ route('brand.edit.segment', ['id' => $segment->id]) }}" class="icon" >
                                            <i class="mdi mdi-edit"></i>
                                        </a>

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
