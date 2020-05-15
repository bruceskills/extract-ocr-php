# Gerador OCR com PHP

### Observação
Essa SDK foi construída devido a necessidade de leitura de imagens utilizando OCR Tesseract do Google. Foi publicada com a ideia de que possa ser útil para outras pessoas. Este repositório (e, consequentemente, seu dono) não possuem qualquer vínculo com o Google.

O pacote fornece uma maneira fácil de realizar upload de imagens e extrair seus textos utilizando Tesseract OCR. 

Este projeto foi inspirado em um pacote do Google [projects/tesseract](https://opensource.google/projects/tesseract).


### Instalando o Tesseract
Clique no link abaixo e instale em seu computador.

https://sourceforge.net/projects/tesseract-ocr-alt/files/latest/download

### Como instalar o pacote
```
composer require bruceskills/extract-ocr-php:dev-master
# Logo após rode o comando abaixo
composer update
```

### Como usar
Abra o arquivo generate.php que se encontra em vendor/bruceskills/extract-ocr-php/public/test, preste atenção nessa linha <b><u>if (!empty($_FILES['image']))</u></b>, onde image se refere ao nome do seu input file no html.
```php

<?php
require "../../vendor/autoload.php";

use OCR\Service;


$service = new Service();
if (!empty($_FILES['image']))
{
    $service->upload($_FILES['image']);
}
```

### Arquivos gerados
Os arquivos que forem extraídos os textos, estão no diretório public/generates e as imagens em public/images.


### Como testar caso tenha clonado
Dentro da raiz do projeto, digite o comando abaixo em seguida abra seu navegador e cole o endereço: http://localhost:8181, Faça o upload de uma imagem que tenha texto, clique em gerar, em alguns segundos o texto é extraido.
```
php -S localhost:8181
```

### Como testar caso tenha feito composer require bruceskills/extract-ocr-php:dev-master
Dentro da raiz do projeto, digite o comando abaixo em seguida abra seu navegador e cole o endereço: http://localhost:8181, Faça o upload de uma imagem que tenha texto, clique em gerar, em alguns segundos o texto é extraido.
```
php -S localhost:8181 -t vendor/bruceskills/extract-ocr-php/
```
