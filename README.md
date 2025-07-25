# Web Developer Junior – Avaliação Técnica

Repositório para avaliação técnica da vaga **Desenvolvedor Web Júnior**.

Projeto construído com foco em boas práticas de arquitetura monolítica, uso correto de ORM, interface responsiva e controle de versão com Git.



⚙️ Funcionalidades 
 - Autenticação com login e senha 
 - Registro de usuários 
 - CRUD completo de posts 
 - Upload de imagem para cada post 
 - Visualização pública do blog 
 - Busca por título de post 
 - Visualização de post individual 

### 📰 Blog Público
- Listagem de posts em destaque com carrossel
- Busca dinâmica por título (AJAX + JSON)
- Página de detalhes do post
- Slugs legíveis para URLs
- Design responsivo com Bootstrap 5



## 🧰 Tecnologias Utilizadas

| Tecnologia | Descrição |
|------------|-----------|
| **CodeIgniter 4** | Framework PHP MVC (monolítico) |
| **Eloquent ORM** | ORM para integração com MySQL |
| **Bootstrap 5** | Layout moderno e responsivo |
| **jQuery + AJAX** | Busca em tempo real |
| **MySQL** | Banco relacional com modelagem |
| **Git** | Versionamento com fluxo `development` → `main` |


## 🗂️ Estrutura de Pastas


app/
├── Controllers/       # Blog + Admin

├── Models/            # Post

├── Views/

│   ├── blog/          # index, show

│   └── admin/         # login, dashboard

public/

├── css/

├── js/

├── uploads/           # imagens dos posts


🔒 Segurança 
- Senhas com password_hash() e password_verify() 
- Sessões armazenam user_id e username 
- Proteção CSRF configurável no .env (csrf.protection = true recomendado após desenvolvimento) 


🧪 Como Executar Localmente
- Clone o projeto:
- git clone https://github.com/lukinha21/web-developer-junior.git
- cd web-developer-junior
- Instale as dependências (se estiver usando Composer):
- composer install
- Configure o banco:
- Crie o banco no MySQL
- Configure o .env:

.env (example) 

<img width="321" height="150" alt="image" src="https://github.com/user-attachments/assets/7271ff83-bd6a-4513-8a42-757196f55dfc" />

- Rode o servidor:
- php spark serve
- Acesse em http://localhost:8080

🧾 Diagrama do Banco de Dados


<img width="431" height="473" alt="image" src="https://github.com/user-attachments/assets/7593a4d4-deab-494e-9eee-6eef0cf4618c" />


Criação de post 

<img width="590" height="253" alt="image" src="https://github.com/user-attachments/assets/5cdf08c4-1a6b-41a6-a315-a4a102a21232" />

DashBoard 

<img width="948" height="515" alt="image" src="https://github.com/user-attachments/assets/ce87657b-8f20-4b80-a865-a81f6de2c011" />

Manutenção de posts 

<img width="949" height="522" alt="image" src="https://github.com/user-attachments/assets/efa18978-a750-492f-a1a0-47e9d8ddbb68" />

Edição de post 

<img width="938" height="492" alt="image" src="https://github.com/user-attachments/assets/f8a00f88-3492-43d8-93ec-62a9e874fe49" />

Pagina de login 

<img width="808" height="542" alt="image" src="https://github.com/user-attachments/assets/95895000-23ed-44a7-a398-868df9710477" />

Pagina de Registro 

<img width="751" height="513" alt="image" src="https://github.com/user-attachments/assets/1d3b3180-77d2-4c8c-9e0e-96258e7f9021" />

Pagina de Principal 

<img width="595" height="515" alt="image" src="https://github.com/user-attachments/assets/c4a1e2f7-47c2-4ccf-9e3e-0e28f78dba78" />

View de um post 

<img width="803" height="470" alt="image" src="https://github.com/user-attachments/assets/28bb865e-e559-41c4-8179-2b0fd88babfc" />

Pesquisar posts 

<img width="796" height="536" alt="image" src="https://github.com/user-attachments/assets/3e90c457-0324-484b-be33-9b8f3e624ed4" />

Todos os Posts 

<img width="805" height="467" alt="image" src="https://github.com/user-attachments/assets/798e09cc-3b76-49fe-b5dd-50e39ec9a9cd" />


📤 Envio
Repositório final hospedado em:
👉 https://github.com/lukinha21/web-developer-junior

🙋‍♂️ Autor
Lucas alexandre da silva
Email: luczslv21@gmail.com
GitHub: @lukinha21
