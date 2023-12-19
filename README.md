# API Laravel - Gerenciamento de Movimentações Financeiras

Bem-vindo à API Laravel para o gerenciamento de movimentações financeiras. Esta API foi desenvolvida para uso pessoal, oferecendo operações CRUD (Create, Read, Update, Delete) para contas, movimentações financeiras e motivos de movimentações. Abaixo estão as principais informações para começar a usar a API.

## Informações Gerais

- **Nome da API:** api_luan
- **Versão da API:** 1.0

## Rotas Disponíveis

### Informações Gerais

- **Método:** GET
- **Endpoint:** `/`
- **Descrição:** Retorna informações básicas sobre a API, como nome e versão.

### Contas

- **Método:** GET
- **Endpoint:** `/contas`
- **Descrição:** Retorna a lista de contas.

- **Método:** POST
- **Endpoint:** `/contas`
- **Descrição:** Cria uma nova conta.

- **Método:** PUT
- **Endpoint:** `/contas`
- **Descrição:** Atualiza uma conta existente.

- **Método:** GET
- **Endpoint:** `/contas/placeholders`
- **Descrição:** Retorna placeholders para contas.

- **Método:** DELETE
- **Endpoint:** `/contas/{codigo}`
- **Descrição:** Exclui uma conta com o código especificado.

- **Método:** PUT/PATCH
- **Endpoint:** `/contas/{codigo}`
- **Descrição:** Atualiza uma conta existente com o código especificado.

### Movimentações Financeiras

- **Método:** GET
- **Endpoint:** `/movto`
- **Descrição:** Retorna a lista de movimentações financeiras.

- **Método:** POST
- **Endpoint:** `/movto`
- **Descrição:** Cria uma nova movimentação financeira.

- **Método:** PUT
- **Endpoint:** `/movto`
- **Descrição:** Atualiza uma movimentação financeira existente.

- **Método:** DELETE
- **Endpoint:** `/movto/{grid}`
- **Descrição:** Exclui uma movimentação financeira com o grid especificado.

- **Método:** PUT/PATCH
- **Endpoint:** `/movto/{grid}`
- **Descrição:** Atualiza uma movimentação financeira existente com o grid especificado.

- **Método:** GET
- **Endpoint:** `/movto/getnext`
- **Descrição:** Obtém a próxima movimentação financeira

### Motivos de Movimentações

- **Método:** GET
- **Endpoint:** `/motivo_movto`
- **Descrição:** Retorna a lista de motivos de movimentações.

- **Método:** POST
- **Endpoint:** `/motivo_movto`
- **Descrição:** Cria um novo motivo de movimentação.

- **Método:** PUT
- **Endpoint:** `/motivo_movto`
- **Descrição:** Atualiza um motivo de movimentação existente.

- **Método:** DELETE
- **Endpoint:** `/motivo_movto/{codigo}`
- **Descrição:** Exclui um motivo de movimentação com o código especificado.

- **Método:** PUT/PATCH
- **Endpoint:** `/motivo_movto/{codigo}`
- **Descrição:** Atualiza um motivo de movimentação existente com o código especificado.

- **Método:** GET
- **Endpoint:** `/motivo_movto/getnext`
- **Descrição:** Obtém o próximo motivo de movimentação.
