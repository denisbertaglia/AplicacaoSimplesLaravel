@extends('layout')

@section('title', 'Histórico de venda')


@section('main')
    <div class="text-center row py-5 ">
        <h1 class="py-2">Histórico de venda</h1>
    </div>
    <section class="row ">
        <div class=" col-12 table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <td>#</td>
                        <td>Data</td>
                        <td>CEP</td>
                        <td>Total</td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendas as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->criado_em}}</td>
                        <td>{{$item->cep}}</td>
                        <td>R$ {{$item->total}}</td>
                        <td>
                        <button type="button" class=" btn btn-sm btn-primary" data-toggle="modal" data-target="#detalhes"  data-single-url="{{route('venda.resgatar',['idVenda'=>$item->id])}}">Detalhes</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
    
    <div class="modal fade" id="detalhes" data-keyboard="false" tabindex="-1" aria-labelledby="detalhesLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="detalhesLabel">
                  Detalhes
              </h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div  class="row justify-content-center" >
                    <strong class="col-12 text-center">:: Dados de Entrega :: </strong>
                </div>
                <div class="row modal-venda">
                    <div class="col-12">
                        <strong> Cep:</strong>  <span class="cep"></span>
                    </div>
                    <div class="col">
                    <strong> Endereco:</strong>  <span class="endereco"></span>
                    </div>
                    <div class="col">
                        <strong> Numero:</strong>  <span class="numero"></span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <strong> Bairro:</strong><span class="bairro "></span> 
                    </div>
                    <div class="col">
                        <strong> Cidade:</strong><span class="cidade"></span>
                    </div>
                    <div class="col">
                        <strong> Estado:</strong>  <span class="estado"></span>
                    </div>
                </div>
                <div  class="row justify-content-center py-2" >
                    <strong class="col-12 text-center">:: Produtos :: </strong>
                </div>
                <div  class="row modal-venda-items" >
                    <div  class="row " >
                        <div class="col-12">
                            <strong>Referencia</strong> 3232
                        </div>
                        <div class="col-12">
                            <strong>Nome:</strong> "Tinta Latex Branca 18 litros"
                        </div>
                        <div class="col-12">
                            <strong>Fornecedor:</strong> "Coral, Sherwin Williams"
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      <script src="{{ asset('js/helpers.js') }}" ></script>
      <script src="{{ asset('js/vendahistorico.js') }}" ></script>
<script>

</script>
@endsection