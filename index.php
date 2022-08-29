<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS do Bootstrap 4.6-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--CSS do Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Estilo Personalizado-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Importação de JS personalizado-->
    <script src="js/books.js" defer></script>
    <title>Books</title>
</head>
<body>
    <header>
        <aside>
            <form action="">
                <div class="form-group">
                    <label for="txt_email">e-mail</label>
                    <input type="email" name="txt_email" id="txt_email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt_senha">senha</label>
                    <input type="password" name="txt_senha" id="txt_senha" class="form-control">
                </div>
                <a href="#">esqueci a senha</a>
                <div>
                    <input type="submit" value="login" class="btn btn-primary">
                    <a href="#" class="btn btn-primary">fazer cadastro</a>
                </div>
            </form>
        </aside>
        <h1>
            <?= "Books"; ?>
        </h1>
        <h2>
            <?php
           // echo "all the boys and girls";
            ?>
       </h2>
    </header>
    <main>
        <form action="ws/salvar-livro.php" class="form-inline justify-content-center">
            <div class="form-group">
            <input type="text" name="txt_livro" id="txt_livro" class="form-control">
            <input type="button" value="salvar" class="btn btn-primary" onclick="criarLivro()">
        </div>
        </form>
        <section id="sessaoDeLivros">
            <?php
            require_once "model/Conexao.php";
            $sql = "SELECT * FROM book;";
            if(!Conexao::execWithReturn($sql)){
                echo Conexao::getErro();
                exit(1);
            }
            
            //print_r(Conexao::getData());

            foreach(Conexao::getData() as $livro):
            ?>
            <article>
                <div>
                    <img src="img/dunacapa.webp" alt="foto do livro">
                </div>
                
                <div class="livro-dados">
                    <h3>Livro: <span> <?= $livro["nome"] ?> </span></h3>
                    <h3>Páginas: <span> <?= $livro["paginas"] ?> </span></h3>
                    <h3>Autor/a/as/es: <span> <?= $livro["autor"] ?> </span></h3>
                </div>

                <div>
                    <div class="marcador">
                        <span class="material-icons">book</span>
                        <span class="contador">12</span>
                    </div>
                    <div class="marcador">
                        <span class="material-icons">favorite</span>
                        <span class="contador">26</span>
                    </div>
                </div>        
            </article>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>