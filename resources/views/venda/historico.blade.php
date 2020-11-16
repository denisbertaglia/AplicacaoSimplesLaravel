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
                        <td>Referência</td>
                        <td>Data</td>
                        <td>CEP</td>
                        <td>Total</td>
                        <td> </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4563</td>
                        <td>23/02/2020 18:40:00</td>
                        <td>00000-000</td>
                        <td>R$ 90,00</td>
                        <td>
                            <button type="button" class=" btn btn-sm btn-primary">Detalhes</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4563</td>
                        <td>23/02/2020 18:40:00</td>
                        <td>00000-000</td>
                        <td>R$ 90,00</td>
                        <td>
                            <button type="button" class=" btn btn-sm btn-primary">Detalhes</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4563</td>
                        <td>23/02/2020 18:40:00</td>
                        <td>00000-000</td>
                        <td>R$ 90,00</td>
                        <td>
                            <button type="button" class=" btn btn-sm btn-primary">Detalhes</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4563</td>
                        <td>23/02/2020 18:40:00</td>
                        <td>00000-000</td>
                        <td>R$ 90,00</td>
                        <td>
                            <button type="button" class=" btn btn-sm btn-primary">Detalhes</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4563</td>
                        <td>23/02/2020 18:40:00</td>
                        <td>00000-000</td>
                        <td>R$ 90,00</td>
                        <td>
                            <button type="button" class=" btn btn-sm btn-primary">Detalhes</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>
    
    <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">
                  Produto encontrado como "<span class="recipient-name"></span>"
              </h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name" value="">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
<script>
    var exampleModal = document.getElementById('staticBackdrop');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        var search = document.getElementById('search');
        document.querySelectorAll(".recipient-name").forEach(
            function (elem){
                elem.textContent = search.value;
            }
        );
    })
</script>
@endsection