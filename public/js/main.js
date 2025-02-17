document.addEventListener("DOMContentLoaded", () => {
    carregarCategorias();
    carregarProdutos();
    atualizarContadorCarrinho();
});

// 🔹 Buscar categorias da API e exibir no menu lateral
function carregarCategorias() {
    let url = "http://localhost:8080/api/categorias"
    fetch(url)
        .then(response => response.json())
        .then(categorias => {
            let lista = document.getElementById("lista-categorias");
            lista.innerHTML = '<li class="nav-item"><a class="nav-link" href="#" onclick="carregarProdutos()">Todos</a></li>';
            categorias.forEach(categoria => {
                let item = `<li class="nav-item">
                            <a class="nav-link" href="#" onclick="carregarProdutos(${categoria.id})">${categoria.nome}</a>
                        </li>`;
                lista.innerHTML += item;
            });
        })
        .catch(error => console.error("Erro ao carregar categorias:", error));
}

// 🔹 Buscar produtos da API e exibir na página
function carregarProdutos(categoriaId = null) {
    let url = categoriaId ? `http://localhost:8080/api/produtos?categoria=${categoriaId}` : "http://localhost:8080/api/produtos";

    fetch(url)
        .then(response => response.json())
        .then(produtos => {
            let lista = document.getElementById("lista-produtos");
            lista.innerHTML = "";
            if (produtos.length > 0) {
                produtos.forEach(produto => {
                    let card = `<div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="${produto.imagem}" class="card-img-top" alt="${produto.nome}">
                                    <div class="card-body">
                                        <h5 class="card-title">${produto.nome}</h5>
                                        <p class="card-text">R$ ${parseFloat(produto.preco).toFixed(2).replace(".", ",")}</p>
                                        <a href="produto.html?id=${produto.id}" class="btn btn-primary">Ver Detalhes</a>                                        
                                    </div>
                                </div>
                            </div>`;
                    lista.innerHTML += card;
                });
            } else {
                lista.innerHTML = "<p class='text-center'>Nenhum produto encontrado.</p>";
            }
        })
        .catch(error => console.error("Erro ao carregar produtos:", error));
}

function renderizarProdutos() {
    let lista = document.getElementById("lista-produtos");
    lista.innerHTML = "";

    let inicio = (paginaAtual - 1) * produtosPorPagina;
    let fim = inicio + produtosPorPagina;
    let produtosPagina = produtosGlobal.slice(inicio, fim);

    if (produtosPagina.length > 0) {
        produtosPagina.forEach(produto => {
            let precoNumero = parseFloat(produto.preco);
            let card = `<div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="${produto.imagem}" class="card-img-top" alt="${produto.nome}">
                            <div class="card-body">
                                <h5 class="card-title">${produto.nome}</h5>
                                <p class="card-text">R$ ${precoNumero.toFixed(2).replace(".", ",")}</p>
                                <a href="produto.html?id=${produto.id}" class="btn btn-primary">Ver Detalhes</a>
                                <button class="btn btn-success mt-2 btn-comprar" onclick="adicionarAoCarrinho(${produto.id}, '${produto.nome}', ${precoNumero})">
                                             🛒 Comprar
                                </button>
                            </div>
                        </div>
                    </div>`;
            lista.innerHTML += card;
        });
    } else {
        lista.innerHTML = "<p class='text-center'>Nenhum produto encontrado.</p>";
    }

    atualizarPaginacao();
}

function atualizarPaginacao() {
    let totalPaginas = Math.ceil(produtosGlobal.length / produtosPorPagina);
    document.getElementById("pagina-atual").innerText = paginaAtual;

    document.getElementById("anterior").disabled = (paginaAtual === 1);
    document.getElementById("proximo").disabled = (paginaAtual === totalPaginas || totalPaginas === 0);
}

function paginaAnterior() {
    if (paginaAtual > 1) {
        paginaAtual--;
        renderizarProdutos();
    }
}

function proximaPagina() {
    let totalPaginas = Math.ceil(produtosGlobal.length / produtosPorPagina);
    if (paginaAtual < totalPaginas) {
        paginaAtual++;
        renderizarProdutos();
    }

// Atualiza Carrinho de compras
function atualizarContadorCarrinho() {
        let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
        document.getElementById("contador-carrinho").innerText = carrinho.length;
    }
// Adiciona Produto ao Carrinho de compras
function adicionarAoCarrinho(id, nome, preco) {
        let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

        let produtoExistente = carrinho.find(produto => produto.id === id);
        if (produtoExistente) {
            produtoExistente.quantidade += 1;
        } else {
            carrinho.push({ id, nome, preco, quantidade: 1 });
        }

        localStorage.setItem("carrinho", JSON.stringify(carrinho));
        atualizarContadorCarrinho();
        alert(`${nome} foi adicionado ao carrinho!`);
    }

}

