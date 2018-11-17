<?php include_once 'layout/painel-administrador.php' ?>
    <div class="row linha-horizontal-banner"></div>
    <div class="row secao">
        <!--Bloco-->
        <div class="col-md-5 blocos-admin-principal borda">
                <div class="row txt-titulos">
                    <h1><strong>Últimos horários cadastrados</strong></h1>
                </div>
                <!--Dados dos blocos-->
                <div class="row alinha-dados-blocos">
                    <div class="col-md-1">
                        <img src="imagens/clock.png">
                    </div>
                    <div class="col-md-9 txt-horario-align">
                        <h4>1. 08:00</h4>
                    </div>
                    <div class="col-md-1">
                        <a href="admin-principal.php">
                            <img src="imagens/trash.png" title="Exluir horário">
                        </a>
                    </div>
                </div>
                <div class="row alinha-dados-blocos">
                    <div class="col-md-1">
                        <img src="imagens/clock.png">
                    </div>
                    <div class="col-md-9 txt-horario-align">
                        <h4>2. 12:00</h4>
                    </div>
                    <div class="col-md-1">
                        <a href="admin-principal.php">
                            <img src="imagens/trash.png" title="Exluir horário">
                        </a>
                    </div>
                </div>
            <!--Linha que exibe os atalhos cadastrar-novo e Listar-->    
            <div class="row borda txt-atalho-novo-listar-todos">
                <div class="col-md-10">
                    <a href="admin-cadastrar-horario-view.php">
                        <h4>Cadastrar um novo horário</h4>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="admin-listar-horarios-escolher-dia.php">
                        <h4>Ver todos</h4>
                    </a>
                </div>
            </div>
        </div>
        <!--Bloco-->
        <div class="col-md-5 blocos-admin-principal borda">
                <div class="row txt-titulos">
                    <h1><strong>Estes horários estão sem vagas</strong></h1>
                </div>
                <!--Dados dos blocos-->
                <div class="row alinha-dados-blocos">
                    <div class="col-md-1">
                        <img src="imagens/clock.png">
                    </div>
                    <div class="col-md-9 txt-horario-align">
                        <h4>1. Sábado, 10/11/2018 às 08:00 hs</h4>
                    </div>
                    <div class="col-md-1">
                        <a href="admin-principal.php">
                        </a>
                    </div>
                </div>
                <div class="row alinha-dados-blocos">
                    <div class="col-md-1">
                        <img src="imagens/clock.png">
                    </div>
                    <div class="col-md-9 txt-horario-align">
                        <h4>2. Sábado, 10/11/2018 às 15:47 hs</h4>
                    </div>
                    <div class="col-md-1">
                        <a href="admin-principal.php">
                        </a>
                    </div>
                </div>
            <!--Linha que exibe os atalhos cadastrar-novo e Listar-->    
            <div class="row borda txt-atalho-novo-listar-todos">
                <div class="col-md-10">
                    <a href="admin-cadastrar-horario-view.php">
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#">
                        <h4>Ver todos</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php include_once 'layout/painel-administrador-rodape.php' ?>