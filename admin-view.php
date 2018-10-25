
    <?php include_once 'layout/header.inc.php' ?>
    <!--section-->
    <section>
        <form action="models/admin.php" method="post">

            <!-- DADOS PESSOAIS-->
            <fieldset>
                <legend>Novo horário de serviço</legend>
                <table cellspacing="10">
                    <tr>
                        <td>
                            <label for="tipo-servico">Código do serviço: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="cod_servico">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tipo-servico">Tipo de serviço: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="tipo-servico">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Data: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="dia" size="2" maxlength="2">
                            <input type="text" name="mes" size="2" maxlength="2">
                            <input type="text" name="ano" size="4" maxlength="4">
                        </td>
                        <td>
                            <label for="horario">Horário: </label>
                        </td>
                        <td align="left">
                            <input type="text" name="horario">
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br />
            <input type="submit">
            <input type="reset" value="Limpar">
        </form>
    </section>