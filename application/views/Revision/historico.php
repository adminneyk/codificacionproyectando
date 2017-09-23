<!DOCTYPE html>
<html>
    <head>
        <style>
            button.accordion {
                background-color: #EE7F00;
                color: wheat;
                cursor: pointer;
                padding: 18px;
                width: 100%;
                border: none;
                font-weight: bold;
                text-align: left;
                outline: none;
                font-size: 12px;
                transition: 0.4s;
            }

            button.accordion.active, button.accordion:hover {
                font-weight: bold;
                color: #000;
            }

            button.accordion:after {
                content: '\002B';
                color: #777;
                font-weight: bold;
                float: right;
                margin-left: 5px;
            }

            button.accordion.active:after {
                content: "\2212";
            }

            div.panel {
                padding: 0 18px;
                background-color: white;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.2s ease-out;
            }
        </style>
    </head>
    <body>
        <h2>Historial de Versiones</h2>
        <?php
        $i = 0;
        foreach ($info->result() as $lista) {
            $i++;
            ?>
            <button class="accordion"><strong>Version #<?= $i ?></strong>) <?= $lista->fecharegistro ?> <br><blockquote><?= "" . $lista->comentarios . "" ?></blockquote> </button>
            <div class="panel">
                <?= $lista->entregable ?>
            </div>
            <?php
        }
        ?>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].onclick = function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                }
            }
        </script>

    </body>
</html>