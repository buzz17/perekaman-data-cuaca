<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item ">
      <p class="nav-text text-right text-capitalize mt-1">
                    <span>Stasiun Meteorologi Sangia Nibandera Kolaka</span>
                    <span><?=$session_role;?></span>
                </p>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-home"></i>
        </a>
      </li>
    </ul>
</nav>

<style>
    /* CSS for navbar text */
    .nav-text {
        font-size: 1rem; /* Adjusts the font size */
        line-height: 1; /* Reduces line spacing */
        margin: 0; /* Removes extra margin */
        padding: 0; /* Removes extra padding */
        text-align: right; /* Centers the text */
    }

    .nav-text span {
        display: block;
        margin: 0; /* Removes any default margin */
        padding: 0; /* Removes any default padding */
    }
</style>