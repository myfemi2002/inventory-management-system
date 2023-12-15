
        <footer class="footer text-center">
            <p class="text-left">
                © <?php
                $copyYear = 2019; // Set your website start date
                $curYear = date('Y'); // Keeps the second year updated
                echo $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : '');
                ?>
                Designed and Developed by <a class="text-primary" href="https://www.newinfo.com.ng/" target="_blank">Newinfo Global Solutions Ltd</a>.
            </p>
            <p>This page took {{ round(microtime(true) - LARAVEL_START, 3) }} seconds to render</p>
        </footer>
