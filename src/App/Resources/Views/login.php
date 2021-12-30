<div id="login">
  <img id="logo-cliente" class="w3-margin-top" src="src/App/Resources/static/imagens/logo_cliente.jpg" />
  <form id="formLogin">
    <input id="usuario" class="w3-input w3-border w3-margin-top" type="text" placeholder="Usuário">
    <input id="senha" class="w3-input w3-border w3-margin-top" type="password" placeholder="Senha">
    <button type="submit" class="w3-button w3-theme w3-margin-top w3-block">Logar</button>
  </form>


  <a href="http://www.santri.com.br">
    <img id="logo-santri" class="w3-right w3-margin-top" src="src/App/Resources/static/imagens/logo_santri.svg" />
  </a>
</div>

<script>  
  $(() => 
    {
      $("#formLogin").submit(e => {
        e.preventDefault()
        $.ajax({
          url: `http://localhost:8080/server.php?method=auth&controller=LoginController&login=${$("#usuario").val()}&senha=${$("#senha").val()}`,
          type: 'GET',
          success(response) {
            response = JSON.parse(response)
            if(response.ATIVO) {
              location.href = 'http://localhost:8080/?view=Pesquisa&controller=AppController'
            } else if (response.error) {
              console.log(response.error)
            }
          }
        }) 
      })
    }
  )
</script>