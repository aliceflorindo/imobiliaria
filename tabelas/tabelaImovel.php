<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DELTΔ Imobiliária | Listagem de anúncios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://mir-s3-cdn-cf.behance.net/project_modules/1400/b8fa3b36209187.5713e53e33d6c.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Comfortaa:wght@300;700&family=Didact+Gothic&family=Fredoka+One&family=Open+Sans:wght@300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            font-family: Comfortaa, sans-serif;
            border: none;
            text-decoration: none;
            transition: .3s;
        }

        tr,
        th,
        td {
        	text-align: center;
            border: 1px solid #fff;
            padding: 5px;
        }

        th,
        td:hover {
            background-color: rgba(218, 140, 0, 1);
        }
    </style>
</head>

<body class="text-bg-dark">
        <h1 class="d-flex justify-content-center mb-2">DELTA</h1>
        <h3 class="d-flex justify-content-center mb-3">Anúncios</h3>

        <table class="container">
            <thead>
                <tr>
                    <th>ID_imovel <span class='fw-semibold'>(PK)</span></th>
                    <th>Área total</th>
                    <th>Área coberta</th>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Rua</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Transação</th>
                    <th>Classificação</th>
                    <th>Referência</th>
                    <th>Nome imagem</th>
                    <th>Caminho imagem</th>
                    <th>ID_usuario <span class='fw-semibold'>(FK)</span></th>
                    <th>Editar/Excluir</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    session_start();
                     
                    if(isset($_SESSION)) {
                        if ($_SESSION['email'] == "alice@admin.com") {
                            include('../db/conexao.php');
                                
                            $sql = "SELECT * FROM $tabelaImovel";
                            $dados = mysqli_query($conn, $sql);
                            while($linha = mysqli_fetch_assoc($dados)) {
                                echo "<tr>
                                        <td>" . $linha['id_imovel'] . "</td>
                                        <td>" . $linha['areatotal'] . "</td>
                                        <td>" . $linha['areacoberta'] . "</td>
                                        <td>" . $linha['estado'] . "</td>
                                        <td>" . $linha['cidade'] . "</td>
                                        <td>" . $linha['rua'] . "</td>
                                        <td>" . $linha['valor'] . "</td>
                                        <td>" . $linha['descricao'] . "</td>
                                        <td>" . $linha['transacao'] . "</td>
                                        <td>" . $linha['classificacao'] . "</td>
                                        <td>" . $linha['referencia'] . "</td>
                                        <td>" . $linha['nome_img'] . "</td>
                                        <td>" . $linha['path'] . "</td>
                                        <td>" . $linha['id_usuario'] . "</td>
                                        <td>
                                        	<a class='btn btn-sm btn-outline-warning' href='acaoADM/editarImovel.php?id_imovel=$linha[id_imovel]'>
                                        		<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
												    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
												</svg>
                                        	</a>
                                        	<a class='btn btn-sm btn-outline-danger' href='acaoADM/deletarImovel.php?id_imovel=$linha[id_imovel]'>
                                        		<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
												    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
												</svg>
                                        	</a>
                                        </td>
                                     </tr>";
                            }
                        } else {
                            header("Location: ../login/index.php");
                        }
                    } else { 
                        header("Location: ../cadastro/index.php");
                    }
                ?>
                
            </tbody>
        </table>
        
        <button class="mt-4 btn btn-warning text-dark ms-5"><a href="../principal/indexPrincipal.php" class="text-decoration-none text-dark">Início</a></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<!-- LINKS:
    https://pt.stackoverflow.com/questions/243576/exibi%C3%A7%C3%A3o-de-uma-tabela-mysql-na-p%C3%A1gina-html
-->
</html>