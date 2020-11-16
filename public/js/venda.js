

    let modalBuscaProduto = qSelector('#modalBuscaProduto');
    let cepInput = qSelector("#cep");

    modalBuscaProduto.addEventListener('show.bs.modal', function (event) {
        let search = document.querySelector('#search');
        document.querySelectorAll(".recipient-name").forEach(
            function (elem){
                elem.textContent = search.value;
            }
        );
    })

    modalBuscaProduto.addEventListener('click', function (event) {
        if( hasClass(event.target,'produto-escolher')){
            incluirProduto();
        }
    });

    let listaProdutos= qSelector("#lista-produtos");
    window.addEventListener("load",somaProdutos);
    function somaProdutos() {
        let soma = 0;
        qSelectorAll("#lista-produtos .produto").forEach(function (element) {
            soma = soma + parseFloat(element.dataset.preco);
        })
        qSelector("#produtos-total").textContent = Number(soma.toFixed(2)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    }

    function incluirProduto() {
        let idTemp = getRandomInt(100);
        listaProdutos.insertAdjacentHTML("beforeend", "<tr class='produto' data-id='"+idTemp+"' data-preco='100.33' > <td>32424</td> <td>Teste</td> <td>Suvinil</td> <td>100,98</td>  <td><button type='button' data-id='"+idTemp+"' class='produto-remover btn btn-sm btn-danger'>Excluir</button></td></tr> ");
        let modalBuscaProduto = bootstrap.Modal.getInstance(qSelector('#modalBuscaProduto'));
        
        modalBuscaProduto.toggle();
        somaProdutos();
    }


    function removeProduto(id) {
        qSelectorAll("#lista-produtos .produto").forEach(function (element) {
            if(element.dataset.id ===id){ element.remove();
            }
        })
        somaProdutos();
    }

    listaProdutos.addEventListener('click', function (event) {
        if( hasClass(event.target,'produto-remover')){
            removeProduto(event.target.dataset.id);
        }
    });

    cepInput.addEventListener('input', (e) => {
        let cep = e.target.value.replace(/\D/g, '');
        let validacep = /^[0-9]{8}$/;
        if(validacep.test(cep)){
            fetchCep(cep, function(response ){
                if (response.erro) {
                    throw Error(response);
                }
                qSelector('#rua').value = response.logradouro;
                qSelector('#bairro').value = response.bairro;
                qSelector('#cidade').value = response.localidade;
                qSelector('#estado').value = response.uf;
            }).catch(function(e){
                qSelector('#rua').value = '';
                qSelector('#bairro').value = '';
                qSelector('#cidade').value = '';
                qSelector('#estado').value = '';
            });
        }
    });