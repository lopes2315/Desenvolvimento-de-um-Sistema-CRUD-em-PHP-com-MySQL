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
Descritivo: nike.com - Create Cat Controller
*******************************************************************************/

include_once __DIR__ . '/../../controllers/CategoriaController.php';

$controller = new CategoriaController();
$data = $controller->index();
$stmt = $data['stmt'];
$num = $data['num'];

include __DIR__ . '/../../views/includes/header.php';
?>

<h2>Categorias</h2>

<a href="/crud_php/public/index.php?page=categorias&action=create" class="button">Criar Nova Categoria</a>

<?php
if($num > 0){
    echo "<table>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Ações</th>";
        echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$nome}</td>";
            echo "<td>";
                echo "<a href=\"/crud_php/public/index.php?page=categorias&action=edit&id={$id}\" class=\"button edit\">Editar</a>";
                echo "<a href=\"/crud_php/public/index.php?page=categorias&action=delete&id={$id}\" class=\"button delete\">Deletar</a>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhuma categoria encontrada.</p>";
}
?>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
