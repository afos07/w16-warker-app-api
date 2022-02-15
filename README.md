<h1>API DESENVOLVIDA COM FINS DE ESTUDOS</h1>

<h2>MÉTODOS API</h2>
<ul>
    <h3>Cidades:</h3>
    <li>
        Listar todos as cidades: api/cidade (GET)
    </li>
    <li>
        Listar uma cidade em específico e seus determinados postos: api/cidades/{idCidade} (GET)
    </li>
    <li>
        Cadastrar uma nova cidade: api/cidade (POST) [
        Parametros necessários:
            cidade;
            latitude;
            longitude;
        ]
    </li>
    <li>
        Editar uma cidade: api/cidade/{idCidade} (PUT) [
        Parametros necessários:
            nome_da_cidade;
            latitude;
            longitude;
        ]
    </li>
    <li>
        Apagar uma cidade: api/cidade/{idCidade} (DELETE)
    </li>
</ul>

<ul>
    <h3>Postos:</h3>
    <li>
        Listar todos os postos: api/posto (GET)
    </li>
    <li>
        Listar um posto em específico: api/postos/{idPosto} (GET)
    </li>
    <li>
        Cadastrar um novo posto: api/posto (POST) [
        Parametros necessários:
            cidade;
            reservatorio;
            latitude;
            longitude;
        ]
    </li>
    <li>
        Editar um posto: api/posto/{idPosto} (PUT) [
        Parametros necessários:
            reservatorio;
            latitude;
            longitude;
        ]
    </li>
    <li>
        Apagar um posto: api/posto/{idPosto} (DELETE)
    </li>
</ul>


# Para rodar a aplicação é necessário ter o composer e rodar os comandos: php migrate | php artisan serve
