<?php

abstract class Validador {

  protected $aviso_inicio;
  protected $aviso_cierre;

  protected $titulo;
  protected $url;
  protected $texto;

  protected $error_titulo;
  protected $error_url;
  protected $error_texto;

  function __construct() {
  }

  protected function variable_iniciada($variable) {
    if (isset($variable) && !empty($variable)) {
      return true;
    } else {
      return false;
    }
  }

  protected function validar_titulo($conexion, $titulo) {
    if (! $this -> variable_iniciada($titulo)) {
      return "Debes escribir un título";
    } else {
      $this->titulo = $titulo;
    }

    if (strlen($titulo) > 255) {
      return "El título no puede ocupar mas de 255 caractéres";
    }

    if (RepositorioEntrada::titulo_existe($conexion, $titulo)) {
      return "Ya existe una entrada con ese título, por favor escoge uno diferente";
    }
  }

  protected function validar_url($conexion, $url) {
    if (! $this -> variable_iniciada($url)) {
      return "Debes escribir una url";
    } else {
      $this->url = $url;
    }

    $url_tratada = str_replace(' ', '', $url);// 1 Filtro para quitar espacios
    $url_tratada = preg_replace('/\s+/', '', $url_tratada);// 2 Filtro para quitar espacios

    // Comprobar si tiene espacios en blanco, TRIM quita los espacios
    if (strlen($url) != strlen($url_tratada)) {
      return "La url introducida no puede contener espacios en blanco";
    }

    if (RepositorioEntrada::url_existe($conexion, $url)) {
      return "Ya existe una entrada con esa url, por favor escoge una diferente";
    }
  }

  protected function validar_texto($conexion, $texto) {
    if (! $this -> variable_iniciada($texto)) {
      return "Debes escribir un texto";
    } else {
      $this->texto = $texto;
    }
  }

  public function obtener_titulo() {
    return $this->titulo;
  }

  public function obtener_url() {
  return $this->url;
  }

  public function obtener_texto() {
  return $this->texto;
  }

  public function mostrar_titulo() {
    if ($this->titulo != "") {
      echo 'value = "' . $this->titulo  . '"';
    }
  }

  public function mostrar_url() {
    if ($this->url != "") {
      echo 'value = "' . $this->url  . '"';
    }
  }

  public function mostrar_texto() {
    if ($this->texto != "" && strlen(trim($this->texto)) > 0) {
      echo $this->texto;
    }
  }

  public function mostrar_error_titulo () {
    if ($this->error_titulo != "") {
      echo $this->aviso_inicio . $this->error_titulo . $this->aviso_cierre;
    }
  }

  public function mostrar_error_url () {
    if ($this->error_url != "") {
      echo $this->aviso_inicio . $this->error_url . $this->aviso_cierre;
    }
  }

  public function mostrar_error_texto () {
    if ($this->error_texto != "") {
      echo $this->aviso_inicio . $this->error_texto . $this->aviso_cierre;
    }
  }

  public function entrada_valida() {
    if($this->error_titulo == "" && $this->error_url == "" && $this->error_texto == "") {
      return true;
    } else {
      return false;
    }
  }

}
