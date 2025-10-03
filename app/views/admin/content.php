<?php
$content = ob_start();
?>
<div class="grid grid-3">
    <a class="card" href="#"><div class="card-body"><h3>Pages</h3><p>Create and edit static pages (Coming soon)</p></div></a>
    <a class="card" href="#"><div class="card-body"><h3>Posts</h3><p>Manage news & blog posts (Coming soon)</p></div></a>
    <a class="card" href="#"><div class="card-body"><h3>Programs</h3><p>Update program details (Coming soon)</p></div></a>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


