@extends('template_compra.index')

@section('contents')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-primary">Produtos!</h1>
    <!-- Coonsulta -->

    <div class="card">
        <div class="card-body">

                <H5>Filtros:

                    Marca: <strong>@php echo $_SESSION["filter_marca"]@endphp</strong>
                    Categoria: <strong>@php echo $_SESSION["filter_categoria"]@endphp</strong>
                    Cor: <strong>@php echo $_SESSION["filter_cor"]@endphp</strong>

                </H5>

                    <div class="card-columns" style="margin-top: 15px">
                         @foreach ($produtos as $linha)
                            <div class="card">
                                    <!-- Product image-->
                                        {{-- <img class="card-img-top produto_img" src="" alt="..." /> --}}
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">
                                                {{ $linha['nome'] }}
                                            </h5>
                                            <!-- Product price-->
                                            <h6>
                                                {{ "R$ ".$linha['preco'] }}
                                            </h6>
                                            <!-- Product desc-->
                                            <p>
                                                <?php echo $linha['descricao'];?>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="mb-2">
                                            <span class="badge badge-success">{{ $linha['id_marca'] }}</span><br>
                                            <span class="badge badge-primary">{{ $linha['id_categoria'] }}</span><br>
                                            <span class="badge badge-secondary">{{ $linha['id_cor'] }}</span><br>
                                        </div>

                                        <div class="mb-2">

                                            @php
                                                $remover = False;
                                            @endphp
                                            @if (@isset($_SESSION["itens_carrinho"]))

                                                @foreach ($_SESSION["itens_carrinho"] as $key => $value)
                                                    @if ($value == $linha['id'])
                                                        @php
                                                            $remover = True;
                                                            $chave = $key;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                            @endif
                                            @if ($remover == True)
                                                <a href="/remover/{{ $chave }}" class="btn btn-danger">
                                                    <li class="fa fa-minus-circle"></li>
                                                </a>
                                            @else
                                                <a href="/adicionar/{{ $linha['id'] }}" class="btn btn-success">
                                                    <li class="fa fa-plus-circle"></li>
                                                </a>
                                            @endif
                                            <a href="/comprar/{{ $linha['id'] }}" class="btn btn-primary">
                                                <li class="fa fa-shopping-cart"></li>
                                            </a>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                    </div>
        </div>
    </div>

@endsection

