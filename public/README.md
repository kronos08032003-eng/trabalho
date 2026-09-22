# API de Pilotos

Curso: 2° Informática  
Unidade Curricular: Desenvolver Serviços Web  
Nome: Felipe de Oliveira Dias


## Endpoints

### `GET /pilotos`

Retorna todos os pilotos cadastrados.

Exemplo:

```bash
curl http://localhost:8080/pilotos
```

Retorno de sucesso: `200 OK`

```json
[
	{
		"id": 1,
		"nome": "Kimi Antonelli",
		"pontos": "292",
		"equipe": "Mercedes"
	}
]
```

### `GET /pilotos/{id}`

Retorna um piloto pelo ID informado na URL.

Exemplo:

```bash
curl http://localhost:8080/pilotos/1
```

Retorno quando o piloto existe: `200 OK`

```json
{
	"id": 1,
	"nome": "Kimi Antonelli",
	"pontos": "292",
	"equipe": "Mercedes"
}
```

Retorno quando o piloto não existe: `404 Not Found`

```json
{
	"erro": "Piloto não encontrado"
}
```

### `POST /pilotos`

Cadastra um novo piloto. O `id` é gerado automaticamente. Envie `nome` e `pontos` no corpo da requisição. O campo `equipe` não é utilizado por este endpoint.

Exemplo:

```bash
curl -X POST http://localhost:8080/pilotos \
	-H "Content-Type: application/json" \
	-d '{"nome":"Charles Leclerc","pontos":"167"}'
```

Retorno de sucesso: `201 Created`

```json
{
	"id": 11,
	"nome": "Charles Leclerc",
	"pontos": "167"
}
```

### `PUT /pilotos/{id}`

Atualiza o nome e a pontuação do piloto informado. Os dois campos devem ser enviados no corpo da requisição.

Exemplo:

```bash
curl -X PUT http://localhost:8080/pilotos/1 \
	-H "Content-Type: application/json" \
	-d '{"nome":"Kimi Antonelli","pontos":"300"}'
```

Retorno quando a atualização é realizada: `200 OK`

```json
{
	"id": 1,
	"nome": "Kimi Antonelli",
	"pontos": "300"
}
```

Retorno quando o piloto não existe: `404 Not Found` (sem corpo de resposta).

### `DELETE /pilotos/{id}`

Remove o piloto informado pelo ID.

Exemplo:

```bash
curl -X DELETE http://localhost:8080/pilotos/1
```

Retorno quando a exclusão é realizada: `204 No Content`, sem corpo de resposta.


## Como executar

Na raiz do projeto, execute:

```bash
php -S localhost:8080 -t public
```

A URL base da API será `http://localhost:8080`.

As requisições que enviam dados devem usar o cabeçalho `Content-Type: application/json`.
