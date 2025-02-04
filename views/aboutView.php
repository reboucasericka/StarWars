<?php
class AboutView {
    public function renderAboutPage($aboutData) {
        // Este método gera o HTML para a página "Sobre"
        echo "<section id='about'>";
        echo "  <p>" . htmlspecialchars($aboutData['description'], ENT_QUOTES) . "</p>"; // Exemplo
        echo "</section>";
    }
}
?>