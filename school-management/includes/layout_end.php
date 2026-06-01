</main><!-- /.page-content -->

</div><!-- /.main-wrapper -->

<!-- ══════════════════════════════════════════════════
     CORE SCRIPTS  (sidebar toggle + page transition)
══════════════════════════════════════════════════ -->
<script src="/SMS/school-management/assets/js/layout_start.js"></script>

<!-- Page-specific scripts injected here via $pageScripts in each page -->
<?php if (!empty($pageScripts)): ?>
    <?php foreach ((array)$pageScripts as $src): ?>
        <script src="<?= htmlspecialchars($src) ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>

</html>