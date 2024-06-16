 <!-- Sidebar -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="../dashboard.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <?php if ($_SESSION['role'] ==  0) : ?> 
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav11" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Submission</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav11" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="../submit_task/create.php">
                <i class="bi bi-circle"></i><span>Submit task</span>
              </a>
            </li>
            <li>
              <a href="../submit_task/index.php">
                <i class="bi bi-circle"></i><span>Manage submitted task</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->
        <?php endif ?>

  <?php if ($_SESSION['role'] ==  1 ) : ?>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../users/create.php">
          <i class="bi bi-circle"></i><span>Add users</span>
        </a>
      </li>
      <li>
        <a href="../users/index.php">
          <i class="bi bi-circle"></i><span>Manage users</span>
        </a>
      </li>
    </ul>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav11" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>File</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav11" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../files/create.php">
          <i class="bi bi-circle"></i><span>Add files</span>
        </a>
      </li>
      <li>
        <a href="../files/index.php">
          <i class="bi bi-circle"></i><span>Manage files</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <?php endif ?>
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav1" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Task</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../tasks/create.php">
          <i class="bi bi-circle"></i><span>Add tasks</span>
        </a>
      </li>
      <li>
        <a href="../tasks/index.php">
          <i class="bi bi-circle"></i><span>Manage tasks</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav7" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Task board</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav7" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../taskboard/create.php">
          <i class="bi bi-circle"></i><span>Add task_board</span>
        </a>
      </li>
      <li>
        <a href="../taskboard/index.php">
          <i class="bi bi-circle"></i><span>Manage task_board</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav17" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Label</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav17" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="../taskboard/create.php">
          <i class="bi bi-circle"></i><span>Add label</span>
        </a>
      </li>
      <li>
        <a href="../taskboard/index.php">
          <i class="bi bi-circle"></i><span>Manage label</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="../pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->


  
</ul>

</aside>
  <!-- Sidebar -->
  