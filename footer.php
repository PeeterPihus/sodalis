    <div class="container footer">
      <hr>
      <footer>
        <p align="right">
        <?php
                if (!isset($_SESSION['username'])) {
                    echo '<a class="nav-link" href="hms-staff.php">Töötajate sisselogimine</a>
                  </li>';
                }
        ?>
        </p>
        </nav>
		</p>
      </footer>
    </div>
  </body>
</html>
