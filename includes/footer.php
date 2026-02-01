<footer>
    <div class="pad-ltr">
        <hr class="w-100">
        <div class="pad-20 g-20 flex items-center jc-between flex-col-768">
            <div class="ltr g-20 flex items-center jc-center">
                <a href="./term-conditions" class="tt-cap fs-11 c-muted">terms & conditions</a>
                &#8739;
                <a href="./privacy-policy" class="tt-cap fs-11 c-muted">Privacy policy</a>
            </div>
            <p class="fs-11 c-muted rtl">&copy; Copyright 2025 Easy2Effective &#8739; All rights reserved</p>
        </div>
    </div>
</footer>

<?php
if ($page == "home" || $page == "about" || $page == "contact") {
?>
    <script src="./assets/js/main.js"></script>
<?php
}

if ($page == "home") {
?>
    <script src="./assets/js/slider.js"></script>
<?php
}
if ($page == "contact") {
?>
    <script src="./assets/js/queryForm.js"></script>
<?php
}
?>

<script src="./assets/js/navbar.js"></script>
</body>
</html>