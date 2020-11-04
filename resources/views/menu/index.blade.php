<div class="be-content">
    <div class="page-head">
        <h2 class="page-head-title">Ordenar Menu</h2>
        <ol class="breadcrumb page-head-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Menu</a></li>
            <li class="active">Ordenar menu</li>
        </ol>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-divider">Ordenar Menu<span class="panel-subtitle">Arraste e solte para ordenar os items</span></div>
                    <div class="panel-body">
                        <div id="list2" class="dd">
                            <ol class="dd-list">
                                @foreach($menu as $m)
                                    <li data-id="{{ $m->data_id }}" class="dd-item dd3-item">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">{{ $m->name }}</div>
                                    </li>
                                @endforeach
                                {{--<li data-id="1" class="dd-item dd3-item">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Início</div>
                                </li>
                                <li data-id="2" class="dd-item dd3-item">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Marcas</div>
                                </li>
                                <li data-id="3" class="dd-item dd3-item">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Quem Somos</div>
                                </li>
                                <li data-id="4" class="dd-item dd3-item">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">FAQ</div>
                                </li>
                                <li data-id="5" class="dd-item dd3-item">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Contato</div>
                                </li>--}}
                            </ol>
                        </div>
                        <div class="xs-mt-30">
                            <pre style="display:none;"><code id="out2"></code></pre>
                            <button class="btn btn-primary" onclick="reorder_menu();">
                                <i class="mdi mdi-check"></i>
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
