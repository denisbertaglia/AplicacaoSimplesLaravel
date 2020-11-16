@extends('layout')

@section('title', 'Registrar de Venda')

@section('main')
    <div class="text-center row py-5 ">
        <h1 class="py-2">Registrar venda</h1>
    </div>
    <form class="row ">
        <div class="col-8 col-md-10 col-form-label">
            <label for="search" class="visually-hidden">Procurar</label>
            <input type="text" class="form-control" id="search" placeholder="Procurar">
        </div>
        <div class="col-4 col-md-2 col-form-label d-grid ">
            <button type="button" class="btn btn-secondary mb-3"  data-toggle="modal" data-target="#modalBuscaProduto">Procurar</button>
        </div>
        <div class=" col-12 table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <td>Referência</td>
                        <td>Nome</td>
                        <td>Fornecedor(es)</td>
                        <td>Preço(R$)</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="lista-produtos">
                    <tr class='produto' data-id='1' data-preco='100.00'>
                        <td>2322</td>
                        <td>Tinta</td>
                        <td>Coral</td>
                        <td>120,44</td>
                        <td>
                            <button type='button' data-id='1' class='produto-remover btn btn-sm btn-danger'>Excluir</button>
                        </td>
                    </tr>
                    <tr class='produto' data-id='2' data-preco='100.00'>
                        <td>2322</td>
                        <td>Tinta</td>
                        <td>Coral</td>
                        <td>120,44</td>
                        <td>
                            <button type='button' data-id='2' class='produto-remover btn btn-sm btn-danger'>Excluir</button>
                        </td>
                    </tr>
                    <tr class='produto' data-id='3' data-preco='100.00'>
                        <td>2322</td>
                        <td>Tinta</td>
                        <td>Coral</td>
                        <td>120,44</td>
                        <td>
                            <button type='button' data-id='3' class='produto-remover btn btn-sm btn-danger'>Excluir</button>
                        </td>
                    </tr>
                    <tr class='produto' data-id='4' data-preco='100.00'>
                        <td>2322</td>
                        <td>Tinta</td>
                        <td>Coral</td>
                        <td>120,44</td>
                        <td>
                            <button type='button' data-id='4' class='produto-remover btn btn-sm btn-danger'>Excluir</button>
                        </td>
                    </tr>
                </tbody>
            <tfoot>
                <tr>
                <td colspan="4" class="text-right">Total:</td>
                <td id="produtos-total">
                    R$ 0,00
                </td>
            </tr>
            </tfoot>
            </table>
        </div>
        <div class="row mb-2">
            <label for="cep" class="col-12 col-sm-1 col-form-label" >CEP</label>
            <div class="col-12 col-sm-5">
                <input type="text" class="form-control" id="cep" maxlength="8" placeholder="00000000" required>
            </div>
        </div>
        <div class="w-100 d-none d-sm-block"></div>
        <div class="row mb-2">
            <label for="rua" class="col-12 col-sm-1 col-form-label" >Rua</label>
            <div class="col-12 col-sm-6">
                <input type="text" class="form-control" id="rua" placeholder="Rua Galvão Bueno" required>
            </div>
            <label for="numero" class="col-12 col-sm-2 col-form-label" >Número</label>
            <div class="col-12 col-sm-3">
                <input type="text" class="form-control" id="numero" placeholder="130" required>
            </div>
        </div>
        <div class="row mb-2">
            <label for="bairro" class="col-12 col-sm-12 col-md-1 col-form-label" >Bairro</label>
            <div class="col-12 col-sm-12 col-md-3">
                <input type="text" class="form-control" id="bairro" placeholder="Boa Vista" required>
            </div>
            <label for="cidade" class="col-12 col-sm-12 col-md-1 col-form-label" >Cidade</label>
            <div class="col-12 col-sm-12 col-md-3">
                <input type="text" class="form-control" id="cidade" placeholder="São João da Fontes" required>
            </div>
            
            <label for="estado" class="col-12 col-sm-12 col-md-1 col-form-label" >Estado</label>
            <div class="col-12 col-sm-12 col-md-3">
                <select class="form-select" id="estado" aria-label="Default select example" required>
                    <option selected value="">Estado</option>
                    @foreach ($estados as $estado)
                        <option value="{{$estado->sigla}}">{{$estado->nome}}</option>
                    @endforeach
                  </select>
            </div>
        </div>
        <div class="row mb-5 py-2 gap-2  justify-content-center">
            <div class="col col-sm-3 mx-auto d-grid">
                <button  type="submit" class="btn btn-primary " >Registrar</button>
            </div>
        </div>
    </form>
    
    <div class="modal fade" id="modalBuscaProduto" data-keyboard="false" tabindex="-1" aria-labelledby="modalBuscaProdutoLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalBuscaProdutoLabel">
                  Produto encontrado como "<span class="recipient-name"></span>"
              </h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <td>Referência</td>
                            <td>Nome</td>
                            <td>Fornecedor(es)</td>
                            <td>Preço(R$)</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2322</td>
                            <td>Tinta</td>
                            <td>Coral</td>
                            <td>120,44</td>
                            <td>
                                <button type="button" data-id='1' class="produto-escolher btn btn-sm btn-success">Escolher</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2322</td>
                            <td>Tinta</td>
                            <td>Coral</td>
                            <td>120,44</td>
                            <td>
                                <button type="button" data-id='2' class="produto-escolher btn btn-sm btn-success">Escolher</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2322</td>
                            <td>Tinta</td>
                            <td>Coral</td>
                            <td>120,44</td>
                            <td>
                                <button type="button" data-id='3' class="produto-escolher btn btn-sm btn-success">Escolher</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2322</td>
                            <td>Tinta</td>
                            <td>Coral</td>
                            <td>120,44</td>
                            <td>
                                <button type="button" data-id='4' class="produto-escolher btn btn-sm btn-success">Escolher</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2322</td>
                            <td>Tinta</td>
                            <td>Coral</td>
                            <td>120,44</td>
                            <td>
                                <button type="button" data-id='5'  class="produto-escolher btn btn-sm btn-success">Escolher</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2322</td>
                            <td>Tinta</td>
                            <td>Coral</td>
                            <td>120,44</td>
                            <td>
                                <button type="button" data-id='6' class="produto-escolher btn btn-sm btn-success">Escolher</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2322</td>
                            <td>Tinta</td>
                            <td>Coral</td>
                            <td>120,44</td>
                            <td>
                                <button type="button" data-id='7' class="produto-escolher btn btn-sm btn-success">Escolher</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      <script src="{{ asset('js/helpers.js') }}" ></script>
      <script src="{{ asset('js/venda.js') }}" ></script>
@endsection