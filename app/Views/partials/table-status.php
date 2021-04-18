<?php
switch ($status ?? '') {
    case 'Backlog / TODO':
        echo '<i class="fas fa-calendar text-primary"></i>';
        break;
    case 'Done':
        echo '<i class="fas fa-check text-primary"></i>';
        break;
    default:
        echo '<i class="fas fa-clock text-primary"></i>';
        break;
}
?>