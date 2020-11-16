<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link"  target="" href="{{ route("venda.registro")}}">
                Registro de Venda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" target=""  href="{{ route("venda.historico")}}">
                Histórico de Venda
                </a>
            </li>
        </ul>
      </div>
    </div>
  </nav>