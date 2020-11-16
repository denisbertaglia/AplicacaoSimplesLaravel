function qSelector(identity){
    return  document.querySelector(identity);
}
function hasClass(element, classString){
    return  element.classList.contains(classString);
}
function qSelectorAll(element){
    return  document.querySelectorAll(element);
}

function getRandomInt(min) {
    min = Math.ceil(min);
    return Math.floor(Math.random() * + min);
}

function fetchCep(cep, callback){
    return fetch(`https://viacep.com.br/ws/${cep}/json/ `, {
            headers: {
                'Content-Type': 'application/json',
            },
    }).then( function(response ){
            return response.json();
    }).then(callback);
}