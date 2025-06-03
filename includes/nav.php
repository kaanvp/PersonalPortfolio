<nav class="nav">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                <i class="fas fa-home"></i> Anasayfa
            </a>
        </li>
        <li class="nav-item">
            <a href="hakkimda.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'hakkimda.php' ? 'active' : ''; ?>">
                <i class="fas fa-user"></i> Hakkımda
            </a>
        </li>
        <li class="nav-item">
            <a href="projeler.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'projeler.php' ? 'active' : ''; ?>">
                <i class="fas fa-folder"></i> Projeler
            </a>
        </li>
        <li class="nav-item">
            <a href="iletisim.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'iletisim.php' ? 'active' : ''; ?>">
                <i class="fas fa-envelope"></i> İletişim
            </a>
        </li>
    </ul>
</nav>
