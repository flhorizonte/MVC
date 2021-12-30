<div>
    <div id="lista_usuarios" class="w3-margin">

      <h4>Cadastro de usuários</h4>

      <div style="display: none;">
        <label>Usuário 1</label>
      </div>

      <form id="formCadastro">
        <div>
          <label>Nome</label>
          <input id="nome" type="text" class="w3-input w3-block w3-border">
        </div>

        <div>
          <label>Login</label>
          <input id="login_input" type="text" class="w3-input w3-block w3-border">
        </div>

        <div>
          <label>Ativo</label>
          <input id="ativo" type="text" class="w3-input w3-block w3-border">
        </div>

        <div>
          <label>Senha</label>
          <input id="senha" type="text" class="w3-input w3-block w3-border">
        </div>

        <ul>
          <li id="opt_cadastrar_clientes"><input type="checkbox" checked value="cadastrar_clientes"> <label>Cadastrar clientes</label></li>
          <li id="opt_excluir_clientes"><input type="checkbox" value="excluir_clientes"> <label>Excluir clientes</label></li>
          <li id="opt_mais"><input type="checkbox" value="mais"> <label>E assim sucessivamente</label></li>
        </ul>

        <button type="submit" class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
        <button type="button" onclick='location.href="http://localhost:8080/?view=Pesquisa&controller=AppController"' class="w3-button w3-theme w3-margin-top w3-margin-bottom">Voltar</button>
      </form>

      
    </div>
  </div>

  <script>
    $(() => {
      $("#formCadastro").submit(e  => {
        e.preventDefault();
        $.ajax({
          url: `http://localhost:8080/server.php?method=cadastro&controller=UserController&nome=${$("#nome").val()}&login=${$("#login_input").val()}&ativo=${$("#ativo").val()}&senha=${$("#senha").val()}`,
          type: 'GET',
          success (response) {
            response = JSON.parse(response)
            
            console.log(response)
          }
        })
      })
    })
  </script>