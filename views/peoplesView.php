<?php
class PeoplesView {
    public function renderPeoplesList($characters) {
        if (empty($characters)) {
            echo "<p>Nenhum personagem encontrado.</p>";
            return;
        }

        echo '<div class="post-container">';

        foreach ($characters as $character) {
            $name = htmlspecialchars($character['name'], ENT_QUOTES);
            $link = $character['link'];
            $image = $character['image'];

            echo '    <a href="' . $link . '" target="_blank" class="post-box">';
            echo '        <div class="post-img">';
            echo '            <img src="' . $image . '" alt="' . $name . '" />';
            echo '        </div>';
            echo '        <div class="post-text">';
            echo '            <span class="category"></span>';
            echo '            <div class="bottom-text">';
            echo '                <div class="character-name">';
            echo '                    <span>Personagem</span>';
            echo '                    <strong>' . $name . '</strong>';
            echo '                </div>';
            echo '            </div>';
            echo '        </div>';
            echo '    </a>';
        }

        echo '</div>';
    }
}
?>
