<nav class="bottom">
  <a class="{{ isset($activeMenu) && $activeMenu =='actu' ? 'active' : '' }}" href="index.php"><i class='bx bx-home'></i></a>
  <a class="{{ isset($activeMenu) && $activeMenu =='search' ? 'active' : '' }}" href="/search"><i class='bx bx-search'></i></a>
  <a class="{{ isset($activeMenu) && $activeMenu =='article' ? 'active' : '' }}" href="/articles"><i class='bx bx-user'></i></a>
  <a href="/logout"><i class='bx bx-log-out-circle'></i></a>
</nav>
