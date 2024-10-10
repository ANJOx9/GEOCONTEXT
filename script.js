const imagens = document.querySelector('.imagens');
const totalImagens = imagens.children.length;
let indiceAtual = 0;
const intervalTime = 3000; // Tempo em milissegundos (3 segundos)

// Função para mover o carrossel
function trocarImagem() {
    indiceAtual = (indiceAtual + 1) % totalImagens; // Vai para a próxima imagem
    const alturaImagem = imagens.children[indiceAtual].clientHeight; // Altura da imagem atual
    imagens.style.transform = `translateY(-${indiceAtual * alturaImagem}px)`; // Mover para a imagem correta
}

// Iniciar a rolagem automática ao carregar a página
setInterval(trocarImagem, intervalTime);

// Função para alternar a visualização da senha
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
}
