<?php

session_start();
if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
  return header("Location: /seguridad/login.php");

}
