# CRUD-DAO

CRUD simples em PHP usando PDO e MySQL para gerenciamento de usuários (pessoa), desenvolvido em aula.

## 📌 Funcionalidades

- Listar usuários
- Criar usuário
- Editar usuário
- Excluir usuário

## 🧱 Estrutura do projeto

- `index.php`: lista usuários e acessa ações de editar/excluir
- `create.php`: formulário e gravação de novo usuário
- `update.php`: formulário e atualização de usuário
- `delete.php`: exclusão de usuário
- `dao.php`: conexão com o banco de dados
- `style.css`: estilos da interface

## ✅ Requisitos

- PHP 7.4+ (ou superior)
- MySQL/MariaDB
- Servidor local (XAMPP, WAMP, Laragon ou similar)

## 🗄️ Banco de dados

Crie o banco `cadastro` e a tabela `pessoa`:

```sql
CREATE DATABASE cadastro;
USE cadastro;

CREATE TABLE pessoa (
  CODIGO INT AUTO_INCREMENT PRIMARY KEY,
  NOME VARCHAR(100) NOT NULL,
  NOMESOCIAL VARCHAR(100) NOT NULL,
  CPF VARCHAR(20) NOT NULL,
  EMAIL VARCHAR(100) NOT NULL,
  ENDERECO VARCHAR(150) NOT NULL,
  SEXO CHAR(1) NOT NULL
);
```

## ⚙️ Configuração

No arquivo `dao.php`, ajuste as credenciais do banco se necessário:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";
```

## ▶️ Como executar

1. Coloque o projeto na pasta do seu servidor local (ex.: `htdocs`).
2. Importe o banco de dados usando o script acima.
3. Inicie o servidor Apache e o MySQL.
4. Acesse no navegador:

```
http://localhost/CRUD-DAO/index.php
```

## 🧪 Observações

- Os campos no formulário correspondem às colunas da tabela `pessoa`.
- O botão **Criar Novo Usuário** direciona para `create.php`.
- A listagem exibe botões para **Editar** e **Excluir**.
