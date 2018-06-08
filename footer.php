    <div class="container footer" style="background-color: white; border: solid; border-color: #cccccc; border-width: thin">
      <footer>
          <h3>Võru kliinik</h3>
          <p style="color: #969696;">Avatud E-R 10-18    tel. 782 0707</p>
          <p style="color: #969696;">         L 10-13    mob. 514 5790</p>
          <p style="color: #969696;">Pikk 21</p>
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
