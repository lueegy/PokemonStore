<?php
    require_once 'dbHelper.php';
    class catalogoController extends dbController
    {
      private $x_pag;
      private $pag;
      private $all_rows;
      private $all_pages;
      private $searchKey;

      function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        ini_set('display_errors', 'on');
        $this->x_pag = 6;
        $this->Ricalcola($this->Count("pokemon"));
      }

      private function Ricalcola($numRows) {
        if (isset($_GET['pag'])) {
          $this->pag = $_GET['pag'];
        }
        else {
          $this->pag  = 1;
        }

        if (!$this->pag || !is_numeric($this->pag)) {
          $this->pag = 1;
        }

        $this->all_rows = $numRows;
        $this->all_pages = ceil($this->all_rows / $this->x_pag);
      }

      public function Catalogo($ricerca) {
        $first = ($this->pag-1) * $this->x_pag;
        $this->searchKey = $ricerca;
        if ($ricerca == '#' ) {
          $sth = $this->Query("SELECT * FROM pokemon LIMIT $first, $this->x_pag");
          $ciao = $this->Count("pokemon");
          $this->Ricalcola($ciao);
        }
        else {
          $this->Ricalcola($this->CountFilterSearch($ricerca));
          $sth = $this->Query("SELECT * FROM pokemon WHERE pokemon.identifier like '%$ricerca%' LIMIT $first, $this->x_pag");
        }
        return $sth;
      }

      public function Impaginazione() {
        echo "<ul class='pagination justify-content-center'>";
        /*$this->all_pages = ceil($this->all_rows / $this->x_pag);
        if ($this->pag > 1) {
          echo "<a class='page-link' href=" . $_SERVER['PHP_SELF'] . "?pag=" . ($this->pag - 1) . "&search=" . $this->searchKey . ">Previous</a>";
        }

        if ($this->all_pages > $this->pag) {
          echo "<a class='page-link' href=" . $_SERVER['PHP_SELF'] . "?pag=" . ($this->pag + 1) . "&search=" . $this->searchKey . ">Next</a>";
        }
        echo "</ul>";
        echo "<ul class='pagination justify-content-center'>";
        for ($p=1; $p<=ceil($this->all_pages/2); $p++) {
          echo "<li class='page-item'><a class='page-link' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "&search=" . $this->searchKey . "\">" . $p .  "</a>&nbsp;</li>";
        }
        echo "</ul>";
        echo "<ul class='pagination justify-content-center'>";
        for ($p=(ceil($this->all_pages/2))+1; $p<=$this->all_pages; $p++) {
          echo "<li class='page-item'><a class='page-link' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "&search=" . $this->searchKey . "\">" . $p . "</a>&nbsp;</li>";
        }*/




        if ($this->all_pages > 1){
          if ($this->pag > 1) {
            echo "<a class='page-link' href=" . $_SERVER['PHP_SELF'] . "?pag=" . ($this->pag - 1) . "&search=" . $this->searchKey . "> <<< </a>";
          }

          if ($p = $this->pag) {
            echo "<li class='page-item'><a class='page-link' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "&search=" . $this->searchKey . "\">" . $p . "</a>&nbsp;</li>";
          }

          for ($p = $this->pag + 1; $p <= $this->pag + 5; $p++) {
            echo "<li class='page-item'><a class='page-link' href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "&search=" . $this->searchKey . "\">" . $p . "</a>&nbsp;</li>";
          }

          if ($this->all_pages > $this->pag) {
            echo "<a class='page-link' href=" . $_SERVER['PHP_SELF'] . "?pag=" . ($this->pag + 1) . "&search=" . $this->searchKey . "> >>> </a>";
          }
        }



        echo "</ul>";
      }
    }























?>
