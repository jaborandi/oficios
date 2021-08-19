# Sistema para controle de ofícios expedidos pelo gabinete
Sistema para controle e acompanhamento de ofícios do gabinete do prefeito

![](https://camo.githubusercontent.com/7a3a3da95ac1f0ace3082eb66233fcef6d176ebe9b34fe442614e9d134fa508d/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f4c6963656e254333254137612d47504c76332d677265656e)

## Screenshots

![Painel Inicial](https://i.imgur.com/3CJgQa5.png)

![Lista de ofícios cadastrados e filtros](https://i.imgur.com/cvc8So5.png)

![Tela para adicionar novo registro](https://i.imgur.com/RUM79RZ.png)

![Tela de visualização e exportação de dados](https://i.imgur.com/0VSt7Jf.png)

![Relatório gerado automaticamente](https://i.imgur.com/vVypl88.png)

## Funcionalidades

- Upload e controle de múltiplos arquivos para cada ofício
- Geração de relatório individual e geral de ofícios
- Fácil controle de andamento dos ofícios através de estatísticas
- Autopreenchimento de dados para informações já imputadas anteriormente
- Barra de pesquisa dinâmica que pesquisa em todos os campos
- Duas opções de filtros dinâmicos relativos a andamento e data (range)
- Cadastro e controle de usuários que terão acesso ao sistema
- Menus intuitivos contendo os ofícios de maneira ordenada
- Controle de alteração e adição (quem e quando imputou tais dados)
- Layout responsivo, facilmente acessível pelo celular
- Exportação de dados simplificada, possibilitando exportar para vários formatos

## Instalando e customizando

##### Instalação

1. Copie todos os arquivos para sua pasta pública em seu servidor apache/nginx php.
2. Crie um banco de dados com usuário e senha, vá ao phpmyadmin e importe o arquivo "**Banco-de-Dados.sql**" neste banco recém criado.
3. Aceda ao arquivo "**config.php**" e altere as **linhas 82 a 85** com os dados do seu usuário e banco recém criados.
4. Entre no sistema por sua URL Web com estas credenciais - **login:admin senha:123456789**

##### Customização

Por se tratar de um sistema que usa como base o codeigniter, toda a customização visual que precisar você irá encontrar na pasta app/views/partials, onde poderá editar o html/js de cada página, basta se orientar usando a URL que você vê no sistema.

## Contribua com o projeto

Este projeto é uma iniciativa totalmente opensource totalmente e gratuita, contribuidores e ideias são muito bem vindas! Entre em contato se deseja contribuir para que possamos fornecer o apoio e documentação necessários para que você possa contribuir com esse projeto.



![](https://camo.githubusercontent.com/d7dfd46fa63366a44818b720366997dc6ffe536b9685130eb0de18758ff7ad06/68747470733a2f2f7777772e676e752e6f72672f67726170686963732f67706c76332d776974682d746578742d3133367836382e706e67)
