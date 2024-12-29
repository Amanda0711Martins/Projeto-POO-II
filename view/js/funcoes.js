const form = document.getElementById('formCadastro');

form.addEventListener('submit', (event) => {
    event.preventDefault(); // Impede o envio padrão do formulário

    // Coleta os dados do formulário
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    // Envia os dados para o servidor (substitua pela sua lógica de envio)
    fetch('seu-endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Dados enviados com sucesso:', data);
        // Exibe uma mensagem de sucesso para o usuário
    })
    .catch(error => {
        console.error('Erro ao enviar os dados:', error);
        // Exibe uma mensagem de erro para o usuário
    });
});