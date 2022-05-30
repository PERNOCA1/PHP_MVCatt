<form method="post" action="/processa">
    <label for="produto">Produto:</label>
    <input id="produto" name="produto" type="text" /> <br />

    <label for="codigo_barra">Código de barra:</label>
    <input id="codigo_barra" name="codigo_barra" type="number"  />

    <label for="termos">Aceito os Termos</label>
    <input id="termos" name="termos" type="checkbox" /> Aceito tudo <br />

    <label for="data_fabric">Data de fabricação:</label>
    <input id="data_fabric" name="data_fabric" type="date"/> <br />
        

    <button type="submit">Enviar</button>
</form>