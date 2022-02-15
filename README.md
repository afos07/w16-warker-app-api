<h1>API DESENVOLVIDA COM FINS DE ESTUDOS</h1>

<h1>MÉTODOS API</h1>

CIDADES:
    # Listar todos as cidades: api/cidade (GET)
    # Listar uma cidade em específico e seus determinados postos: api/cidades/{idCidade} (GET)
    # Cadastrar uma nova cidade: api/cidade (POST) [
        Parametros necessários:
        cidade;
        latitude;
        longitude;
    ]
    # Editar uma cidade: api/cidade/{idCidade} (PUT) [
        Parametros necessários:
        nome_da_cidade;
        latitude;
        longitude;
    ]
    # Apagar uma cidade: api/cidade/{idCidade} (DELETE)
POSTOS:
    # Listar todos os postos: api/posto (GET)
    # Listar um posto em específico: api/postos/{idPosto} (GET)
    # Cadastrar uma nova cidade: api/posto (POST) [
        Parametros necessários:
        cidade;
        reservatorio;
        latitude;
        longitude;
    ]
    # Editar um posto: api/posto/{idPosto} (PUT) [
        Parametros necessários:
        reservatorio;
        latitude;
        longitude;
    ]
    # Apagar um posto: api/posto/{idPosto} (DELETE)

    # Para rodar a aplicação é necessário ter o composer e rodar os comandos: php migrate | php artisan serve
