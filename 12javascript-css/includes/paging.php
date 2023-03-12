    <nav>
        <ul class="pagination">
            <li class="page-item">
                <?php if ($paging->previous) : ?>
                    <a class="page-link" href="?page=<?= $paging->previous ?>">Previous</a>
                <?php else : ?>
                    <span class="page-link">Previous</span>
                <?php endif; ?>
            </li>
            <li class="page-item">
                <?php if ($paging->next) : ?>
                    <a class="page-link" href="?page=<?= $paging->next ?>">Next</a>
                <?php else : ?>
                    <span class="page-link">Next</span>
                <?php endif; ?>
            </li>
        </ul>
    </nav>