<?php

class AptifyFailure extends Exception {
  protected $extra;

  public function __construct($message = "", $extra = []) {
    parent::__construct($message);
    $this->extra = $extra;
  }

  final public function getExtra() {
    return $this->extra;
  }

}