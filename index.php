<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Jogo adivinhe o número</title>

    <style>
        html {
            font-family: sans-serif;
        }
        
        body {
            width: 50%;
            max-width: 800px;
            min-width: 480px;
            margin: 0 auto;
        }
        
        .lastResult {
            color: white;
            padding: 3px;
        }
        footer{
            padding:10px;
            text-align:center;
        }
    </style>
</head>

<body>
    <h1>Jogo adivinhe o número</h1>

    <p>Nós selecionamos um número aleatório entre 1 e 100. Veja se consegue adivinhar em 10 chances ou menos. Nós lhe diremos se seu palpite foi muito alto ou muito baixo.</p>

    <div class="form">
        <label for="campoPalpite">Digite seu palpite: </label><input type="text" id="campoPalpite" class="campoPalpite">
        <input type="submit" value="Enviar palpite" class="envioPalpite">
    </div>

    <div class="resultadoParas">
        <p class="palpites"></p>
        <p class="ultimoResultado"></p>
        <p class="baixoOuAlto"></p>
    </div>
    <footer>Desenvolvido por  @luckcastle</footer>

</body>

<script>
    var numeroAleatorio = Math.floor(Math.random() * 100) + 1;

    var palpites = document.querySelector('.palpites');
    var ultimoResultado = document.querySelector('.ultimoResultado');
    var baixoOuAlto = document.querySelector('.baixoOuAlto');

    var envioPalpite = document.querySelector('.envioPalpite');
    var campoPalpite = document.querySelector('.campoPalpite');

    var contagemPalpites = 1;
    var botaoReinicio;

    function conferirPalpite() {
        var palpiteUsuario = Number(campoPalpite.value);
        if (contagemPalpites === 1) {
            palpites.textContent = 'Palpites anteriores: ';
        }

        palpites.textContent += palpiteUsuario + ' ';

        if (palpiteUsuario === numeroAleatorio) {
            ultimoResultado.textContent = 'Acertou mizeravi !';
            ultimoResultado.style.backgroundColor = 'green';
            baixoOuAlto.textContent = '';
            configFimDeJogo();

        } else if (contagemPalpites === 10) {
            ultimoResultado.textContent = '!!! ACABOU MIZERA !!!';
            baixoOuAlto.textContent = '';
            configFimDeJogo();
        } else {
            ultimoResultado.textContent = 'Errou Mizeravi !';
            ultimoResultado.style.backgroundColor = 'red';
            if (palpiteUsuario < numeroAleatorio) {
                baixoOuAlto.textContent = 'Tá baixo caba! bota mais alto!';
            } else if (palpiteUsuario > numeroAleatorio) {
                baixoOuAlto.textContent = 'Tá alto caba! bota mais baixo!';
            }
        }

        contagemPalpites++;
        campoPalpite.value = '';
        campoPalpite.focus();
    }
    envioPalpite.addEventListener('click', conferirPalpite);

    function configFimDeJogo() {
        campoPalpite.disabled = true;
        envioPalpite.disabled = true;
        botaoReinicio = document.createElement('button');
        botaoReinicio.textContent = 'Vai mais uma Mizeravi?';
        document.body.appendChild(botaoReinicio);
        botaoReinicio.addEventListener('click', reiniciarJogo);
    }

    function reiniciarJogo() {
        contagemPalpites = 1;

        var reiniciarParas = document.querySelectorAll('.resultadoPars p');
        for (var i = 0; i < reiniciarParas.length; i++) {
            reiniciarParas[i].textContent = '';
        }

        botaoReinicio.parentNode.removeChild(botaoReinicio);

        campoPalpite.disabled = false;
        envioPalpite.disabled = false;
        campoPalpite.value = '';
        campoPalpite.focus();

        ultimoResultado.style.backgroundColor = 'white';

        numeroAleatorio = Math.floor(Math.random() * 100) + 1;
    }
</script>

</html>