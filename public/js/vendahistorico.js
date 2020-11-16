let exampleModal = qSelector('#detalhes');
exampleModal.addEventListener('show.bs.modal', function (event) {
    let url = event.explicitOriginalTarget.dataset.singleUrl;
        qSelector('#detalhes .cep').textContent = "..";
        qSelector('#detalhes .endereco').textContent = "..";
        qSelector('#detalhes .numero').textContent = "..";
        qSelector('#detalhes .bairro').textContent = "..";
        qSelector('#detalhes .cidade').textContent = "..";
        qSelector('#detalhes .estado').textContent = "..";
        fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                }
        }).then( function(response ){
            return response.json();
        }).then( function(response ){
            console.log(qSelector('#detalhes .modal-body'));
            console.log(response);
            let modalBody = qSelector('#detalhes .modal-body');
            qSelector('#detalhes .cep').textContent = response.cep;
            qSelector('#detalhes .endereco').textContent = response.endereco;
            qSelector('#detalhes .numero').textContent = response.numero;
            qSelector('#detalhes .bairro').textContent = response.bairro;
            qSelector('#detalhes .cidade').textContent = response.cidade;
            qSelector('#detalhes .estado').textContent = response.estado;

            qSelector('#detalhes .modal-venda-items').textContent =''; 
            let containerItems = qSelector('#detalhes .modal-venda-items'); 
            containerItems.textContent =''; 
            response.items.forEach(function(elem){
                let preco = Number(elem.preco.toFixed(2)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
                containerItems.insertAdjacentHTML("beforeend", `
                <div  class="row py-2" >
                    <div class="col-12">
                        <strong>Referencia</strong> ${elem.referencia}
                    </div>
                    <div class="col-12">
                        <strong>Nome:</strong> ${elem.nome}
                    </div>
                    <div class="col-12">
                        <strong>Fornecedor:</strong>  ${elem.fornecedor}
                    </div>
                    <div class="col-12">
                        <strong>Preco:</strong> ${preco}
                    </div>
                </div>  `);

            });


        });
})