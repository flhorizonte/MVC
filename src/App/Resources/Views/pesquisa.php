<div>
  <div class="lista_usuarios" class="w3-margin">
    <div class="div-form">
      <form id="formPesquisa" style="display: flex;flex-direction: column;">
        <div>
          <input id="pesquisa" class="w3-input w3-border w3-margin-top" type="text" placeholder="Nome">
        </div>
        <div style="display: flex;flex-direction:row;justify-content:space-between">
          <button type="submit" class="w3-button w3-theme w3-margin-top">Buscar</button>
          <button onclick='location.href="http://localhost:8080/?view=cadastro&controller=AppController"' class="w3-button w3-theme w3-margin-top w3-right">Cadastrar novo usuário</button>
        </div>
      </form>
    </div>
    <div class="table-pesquisa">
      <table style="width: 100%;text-align:center;background-color:#f1f1f1;padding:25px">
        <thead>
          <tr>
            <th>Nome</td>
            <th>Login</td>
            <th>Ativo</td>
            <th>Opções</td>
          </tr>
        </thead>
        <tbody id="cells">
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $(() => {
    search()
    $("#formPesquisa").submit(e => {
      $("#cells").html('')
      e.preventDefault();

      search($("#pesquisa").val())
    })
  })

  function excluir(id) {
    $("#cells").html('')
    $.ajax({
      url: `http://localhost:8080/server.php?method=delete&controller=UserController&id=${id}`,
      type: 'GET',
      success(response) {
        response = JSON.parse(response)
        console.log(response)
        search()
      }
    })
  }

  function search(nome = null) {
    let _url = `http://localhost:8080/server.php?method=pesquisar&controller=UserController`;
    nome !== null ? _url += `&nome=${nome}` : _url += ''
    $.ajax({
      url: _url,
      type: 'GET',
      success(response) {
        response = JSON.parse(response)
        console.log(response)
        for (let it = 0; it < response.length; it++) {
          $("#cells").append(`
                  <tr>
                    <td>${response[it].NOME_COMPLETO}</td>
                    <td>${response[it].LOGIN}</td>
                    <td>${response[it].ATIVO}</td>
                    <td>
                      <button onclick="excluir(${response[it].USUARIO_ID})" class="w3-button w3-theme w3-margin-top"><i class="fas fa-user-times"></i></button>
                      <button class="w3-button w3-theme w3-margin-top"><i class="fas fa-edit"></i></button>
                    </td>
                  </tr>
                `)
        }
      }
    })
  }
</script>