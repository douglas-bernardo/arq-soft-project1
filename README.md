
<h1 style="display: flex; align-items: center; justify-content: center;" class="logo">
  Menu Digital
</h1>

&nbsp;

<h1>
    <img src="https://ik.imagekit.io/rcjzrqiiqm7/menu-digital-aop_wYGjImnf_.gif?updatedAt=1629856439666">
</h1>

<h4 align="center">
	Status 🚀 Finalizado  ☑️
</h4>

# Índice

- [Sobre](#-sobre)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [Como baixar o projeto](#-como-baixar-o-projeto)
- [Features](#-features)

&nbsp;

## 🔖&nbsp; Sobre

---

O projeto **Menu Digital** é um sistema de menu digital completamente personalizável que permitirá o cadastro de produtos presentes no portfólio de qualquer restaurante, lanchonete, bar que contratar o serviço.

Esta aplicação foi desenvolvida com com intuito de aplicar os conhecimentos relativos aos padrões GRASP e GOF e Programação Orientada a Aspectos, adquiridos na disciplina de Arquitetura de Software do curso de Análise e Desenvolvimento de Sistemas - UNIFOR.

&nbsp;

## 🚀 Tecnologias utilizadas
---
Este projeto foi desenvolvido utilizando as seguintes tecnologias:

- [PHP](https://www.php.net)

#### Principais componentes PHP utilizados

- Framework para Programação Orientada a Aspectos
    - [Go! AOP](https://github.com/goaop/framework)
- Templates
    - [Twig](https://twig.symfony.com/)
- Gerenciamento de imagens
    - [coffeecode/uploader](https://packagist.org/packages/coffeecode/uploader)
    - [coffeecode/cropper](https://packagist.org/packages/coffeecode/cropper)
- Logs
    - [Monolog](https://github.com/Seldaek/monolog)
- Envio de e-mails
    - [PHP Mailer](https://github.com/PHPMailer/PHPMailer)

&nbsp;

## 🗂 Como baixar o projeto
---
### Pré-requisitos

Antes de começar, você vai precisar montar um ambiente padrão para desenvolvimento web em PHP (Recomendo fortemente uma pilha [LAMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-20-04-pt)).
- PHP 7.4+
- Apache 2.4+
- MariaDb 10+ 

Ferramentas:
- [Composer](https://getcomposer.org/) (prefira uma instalação global)
- [Git](https://git-scm.com/)

Além disto é bom ter uma boa IDE ou editor para trabalhar com o código. Recomendo o [PHPStorm](https://www.jetbrains.com/pt-br/phpstorm/) da Jetbrains ou o [VSCode](https://code.visualstudio.com/).

Instale as seguintes extensões PHP:
```bash
php8.0-common php8.0-mysql php8.0-xml php8.0-curl php8.0-gd php8.0-imagick php8.0-cli php8.0-dev php8.0-imap php8.0-mbstring php8.0-opcache php8.0-soap php8.0-zip php8.0-intl
```

&nbsp;

```bash
    # Clonar o repositório
    $ git clone https://github.com/douglas-bernardo/menu-digital-aop

    # Entrar no diretório
    $ cd /menu-digital-aop

    # Instalar as dependências
    $ composer install

    # Iniciar o projeto
    # servidor embutido
    $ php -S localhost:8080 -t
    
    # ou acesse via localhost
    # http://localhost/pasta-do-projeto
```

&nbsp;

## ⚙️ Features
---

#### Básicas
- [x] Cadastro de Produtos
- [x] Listagem/Edição de Produtos
- [x] Cadastro de Categorias
- [x] Listagem/Edição de Categorias

#### Especiais (AOP)
- [x] Envio de alerta de baixa de estoque por E-mail [AWS]
- [x] Envio de alerta de baixa de estoque por Telegram [BOT]
- [x] Transactions automatizadas
- [x] Gerenciamento de Logs

---

&nbsp;

# Autor

<p>
    Desenvolvido Por Jackson Douglas
</p>

<br/>
<div>
  <a href = "mailto:jkdouglas21@gmail.com"><img src="https://img.shields.io/badge/-Gmail-%23333?style=for-the-badge&logo=gmail&logoColor=white" target="_blank"></a>
  <a href="https://www.linkedin.com/in/douglas-bernardo" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a>
  <a href="https://twitter.com/jkdouglas21" target="_blank"><img src="https://img.shields.io/badge/Twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white" target="_blank"></a>
</div>
