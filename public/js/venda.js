    let modalBuscaProduto = qSelector('#modalBuscaProduto');
    let cepInput = qSelector("#cep");

    modalBuscaProduto.addEventListener('show.bs.modal', function (event) {
        let search = document.querySelector('#search');
        let url = event.explicitOriginalTarget.dataset.urlFind;
            fetch(url+'?'+ new URLSearchParams({
                pesquisa:search.value
            }), {
                    headers: {
                        'Content-Type': 'application/json',
                    }
            }).then( function(response ){
                return response.json();
            }).then( function(response ){
                let listaBuscaProduto = qSelector('#modalBuscaProduto .listaBuscaProduto');
                listaBuscaProduto.textContent ='';
                response.forEach(function(elem){
                    let preco = Number(elem.preco.toFixed(2)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
                    let  fornecedores = elem.fornecedores.map(function(fornecedor){
                        return fornecedor.nome;
                    }).join(",");
                    listaBuscaProduto.insertAdjacentHTML("beforeend", `<tr class='produto' data-id='${elem.id}' data-preco='${elem.preco}' > <td>32424</td> <td>${elem.nome}</td> <td>${fornecedores}</td> <td>${preco}</td>  <td><button type='button' data-id='${elem.id} 'class='produto-escolher btn btn-sm btn-success'>Escolher</button></td></tr>`);

                });
            });
        document.querySelectorAll(".recipient-name").forEach(
            function (elem){
                elem.textContent = search.value;
            }
        );
    })

    modalBuscaProduto.addEventListener('click', function (event) {
        let id = event.explicitOriginalTarget.dataset.id;
        if( hasClass(event.target,'produto-escolher')){
            incluirProduto(id);
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

    function incluirProduto($id) {
        let listaProdutos = qSelector('#lista-produtos');
        let url = listaProdutos.dataset.urlFindOne;
        fetch(`${url}/${$id}`, {
                headers: {
                    'Content-Type': 'application/json',
                },
        }).then( function(response ){
            return response.json();
        }).then( function(response ){
            let preco = Number(response.preco.toFixed(2)).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' })
            let  fornecedores = response.fornecedores.map(function(fornecedor){
                return fornecedor.nome;
            }).join(",");
            listaProdutos.insertAdjacentHTML("beforeend", `<tr class='produto' data-id='${response.id}' data-preco='${response.preco}' > <td>${response.referencia}</td> <td>${response.nome}</td> <td>${fornecedores}</td> <td>${preco}</td>  <td><button type='button' data-id='${response.id}' class='produto-remover btn btn-sm btn-danger'>Excluir</button></td></tr> 
            <input type="hidden" name="produtoId[]" value="${response.id}">`);
            let modalBuscaProduto = bootstrap.Modal.getInstance(qSelector('#modalBuscaProduto'));
            modalBuscaProduto.toggle();
            somaProdutos();
        });

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
                qSelector('#endereco').value = response.logradouro;
                qSelector('#bairro').value = response.bairro;
                qSelector('#cidade').value = response.localidade;
                qSelector('#estado').value = response.uf;
            }).catch(function(e){
                qSelector('#endereco').value = '';
                qSelector('#bairro').value = '';
                qSelector('#cidade').value = '';
                qSelector('#estado').value = '';
            });
        }
    });

    qSelector('#fomrRegistrar').addEventListener('submit', function (event) {
        event.preventDefault();
        let hasProduto = qSelector('#fomrRegistrar .produto');
        if(hasProduto!== null){
            qSelector('#fomrRegistrar').submit();
        }
    });
    