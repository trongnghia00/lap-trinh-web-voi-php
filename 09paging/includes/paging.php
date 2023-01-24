    <nav>
        <ul>
            <li>
                <?php if ($paging->previous) : ?>
                    <a href="?page=<?= $paging->previous ?>">Previous</a>
                <?php else : ?>
                    Previous
                <?php endif; ?>
            </li>
            <li>
                <?php if ($paging->next) : ?>
                    <a href="?page=<?= $paging->next ?>">Next</a>
                <?php else : ?>
                    Next
                <?php endif; ?>
            </li>
        </ul>
    </nav>