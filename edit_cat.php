<?php
/******************************************************************************
Curso: Engenharia de Software
Disciplina: Linguagem e Técnicas de Programacão
Professor: José Carlos Domingues Flôres
Turma: ESOFT-2B
Componentes:
 25363242-2 - Euclides Benedito modesto Coelho Neto  
 25357716-2 - Felipe Eidy Toyama                        
 25362174-2 - Guilherme Lopes Pereira Vidal            
 25357453-2 - Leonardo de Jesus Sabino Flugel             
 25362698-2 - Luis Guilherme Ramon Schuhli Schultz 
Data: 11 de Novembro de 2025
Descritivo: nike.com - edit Cat Controller
*******************************************************************************/
include_once __DIR__ . '/../../controllers/CategoriaController.php';

$controller = new CategoriaController();

$id = isset($_GET['id']) ? $_GET['id'] : die('ID da categoria não fornecido.');

$categoria = $controller->readOne($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    if ($controller->update($id, $nome)) {
        header('Location: /crud_php/public/index.php?page=categorias');
        exit();
    } else {
        echo "<p class='error'>Não foi possível atualizar a categoria.</p>";
    }
}

include __DIR__ . '/../../views/includes/header.php';
?>

<h2>Editar Categoria</h2>

<form action="/crud_php/public/index.php?page=categorias&action=edit&id=<?php echo $id; ?>" method="POST">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($categoria->nome, ENT_QUOTES); ?>" required>
    <button type="submit" class="button">Salvar</button>
    <a href="/crud_php/public/index.php?page=categorias" class="button">Cancelar</a>
</form>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
