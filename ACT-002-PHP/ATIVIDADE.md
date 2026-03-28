# *Introdução a Cookies e Sessions no PHP*  
  <br>
    
# Exercícios

## Exercício 1 - Pergunta Conceitual

Explique a diferença entre **cookies e sessions** no PHP.

Em sua resposta, considere:

- onde os dados são armazenados
- quais são mais seguros
- em quais situações cada um pode ser mais adequado.
<br>

## Resposta:

Cookies e Sessions são utilizados para armazenar dados entre requisições em aplicações web, porém funcionam de maneiras diferentes.


### Onde os dados são armazenados

### Cookies
- São armazenados **no navegador do usuário (cliente)**  
- Ficam salvos no dispositivo do usuário  

### Sessions
- São armazenadas **no servidor**  
- O navegador guarda apenas um identificador da sessão (geralmente um cookie chamado `PHPSESSID`)  


## 🔒 Segurança

### Cookies
- Menos seguros  
- Podem ser acessados e modificados pelo usuário  
- Estão mais vulneráveis a ataques como manipulação de dados  

### Sessions
- Mais seguras  
- Os dados ficam no servidor, sem acesso direto do usuário  
- Mesmo assim, dependem de boas práticas (ex: uso de HTTPS, proteção contra roubo de sessão)  



## ⚙️ Quando usar cada um

### Cookies
São mais adequados para:
- Armazenar preferências do usuário (tema, idioma)
- Dados não sensíveis  
- Informações que precisam persistir mesmo após fechar o navegador  

### Sessions
São mais adequadas para:
- Controle de login/autenticação  
- Dados sensíveis  
- Informações temporárias durante a navegação  



## ✅ Conclusão

A principal diferença está no local de armazenamento e na segurança.  

- **Cookies** → simples e persistentes, porém menos seguros  
- **Sessions** → mais seguras e controladas, ideais para dados importantes  

Na prática, aplicações modernas utilizam **sessions junto com cookies**, combinando praticidade e segurança.

---

## Exercício 2 — Pergunta de aplicação

Imagine que você está desenvolvendo um sistema de **loja virtual**.

Explique como cookies e sessions poderiam ser utilizados para:

- manter o usuário logado
- armazenar itens temporários no carrinho
- registrar preferências do usuário.

Justifique suas escolhas.
<br>

## Resposta:

## A) Manter o usuário logado
### ❌ Cookies
Seria possível manter o usuário logado apenas com cookies, por exemplo:

- Usando um cookie com o `user_id`;
- ou utilizando um **token** de autenticação.
<br>

### Problemas:

- Cookies podem ser facilmente manipulados (são de certa forma previsíveis);
- Permite a falsificação de identidade (spoofing);
- Não existe validação no servidor.
<br>
Conclusão: Não utilizar em hipótese alguma, muito vulnerável.
<br>
<br>

### ✔️ Session + Cookies (padrão comum)

- O servidor cria uma session:
  
$_SESSION['user_id'] = 123;

<br>

- O navegador recebe um cookie com o ID da sessão:
  
cookie: PHPSESSID=abc123

<br>

- O servidor usa esse ID para recuperar os dados da session.

<br>

### ⚠️ Importante

Usar session com certeza é mais seguro que usar apenas cookies, porém não é automaticamente seguro.

Se uma pessoa má intencionada conseguir roubar o cookie (ex: via XXS ou rede insegura), ele pode facilmente se passar pelo usuário (**session hijacking**).

### Ou seja:

- **O sistema não impede o uso indevido do cookie**
- Ele apenas dificulta a falsificação, pois o ID da sessão é "aleatório"
- A segurança depende de medidas adicionais:
  
  - HTTPS
  - HttpOnly
  - Expiração de sessão
  - Regeneração de ID

<br>
## B) Armazenar itens temporários no carrinho

### ❌ Cookies (possível, mas pouco confiável)

Um cookie com carrinho ficaria mais ou menos da seguinte maneira:

`[{"id":1, "qtd":5},{"id": 4, "qtd":9}]`

Nesse caso, o próprio navegador tem que enviar esses dados a cada requisição

### ⚠️ Problemas:

- O usuário pode facilmente alterar o conteúdo
  - Alterar quantidade (imagine o usuário colocando 9999 unidades no carrinho, ia comprometer o sistema ao enviar o cookie)  

- Os dados ficam mais expostos;
- Existe limite de tamanho (~4KB).
<br>

### ✔️ Session

Os itens do carrinho ficam armazenados no servidor:

```php
$_SESSION['carrinho'] = [
  ["id" => 1, "qtd" => 2],
  ["id" => 5, "qtd" => 1]
];
```
O navegador nesse caso mantém apenas o ID da sessão (que vai puxar o conteúdo do carrinho também)

### Conclusão:

Assim como no caso anterior, nesse caso ainda é mais seguro usar session, mas não elimina riscos.

## C) Registrar preferências do usuário

### ✔️ Cookies

Nesse caso os cookies são ideais.

Preferências geralmente incluem: 

- Tema (claro/escuro);
- Idioma;
- Moeda.

Ex: `cookie: tema=dark`

### ✅ Vantagens:

- Persistem mesmo sem login;
- Não exigem armazenamento no servidor;
- São leves e simples de implementar;

Como nesse caso não existem dados sensíveis, não tem problema usar cookies.

<br>

### ❌ Session (utilizável, mas não é o método mais adequado)

É totalmente possível usar session:

`$_SESSION['tema'] = 'dark';`

Mas não é ideal, pois

- Essas preferências vão se perder ao fazer logout;
- Depende do usuário estar logado;
- Gera uso desnecessário do servidor.

Nesse caso, não é errado usar session, mas é desnecessário.

---

## Exercício 3 — Pergunta de investigação

Crie um arquivo chamado `teste.php` com o seguinte código:

```php
setcookie("contador", "1", time()+3600);

if(isset($_COOKIE["contador"])) {
    echo "Valor do cookie: " . $_COOKIE["contador"];
} else {
    echo "Cookie ainda não disponível.";
}

?>
```
Agora realize os seguintes passos:

1. Execute o arquivo no navegador.
2. Atualize a página.
3. Abra as ferramentas do navegador e visualize os cookies.
4. Limpe os cookies do site e atualize novamente.

Descreva:

- o que aconteceu em cada etapa
- por que o cookie não aparece imediatamente na primeira execução.

<br>

## Resposta:

<!-- 
colocar resposta aqui no lugar desse comentário, usando a caixinha de código igual do jeito que tá acima ( ```)
-->

---

## Exercício 4 — Pergunta de reflexão

Por que **sessions são geralmente preferidas para autenticação de usuários** em sistemas web?

Discuta:

- segurança
- manipulação de dados
- possíveis riscos ao utilizar apenas cookies.

## Resposta:

<!-- colocar a resposta aqui -->
