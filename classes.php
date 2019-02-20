<?php

abstract class Plane {
  private $max_speed;

  private $carrying;

  public function __construct($max_speed = 750, $carrying = 2000)
  {
    $this->max_speed = $max_speed;
    $this->carrying = $carrying;
  }

  /**
   * @return mixed
   */
  public function getMaxSpeed() {
    return $this->max_speed;
  }

  /**
   * @param mixed $max_speed
   */
  public function setMaxSpeed($max_speed) {
    $this->max_speed = $max_speed;
  }

  /**
   * @return mixed
   */
  public function getCarrying() {
    return $this->carrying;
  }

  /**
   * @param mixed $carrying
   */
  public function setCarrying($carrying) {
    $this->carrying = $carrying;
  }

  public function fly() {
    return 'Fly with speed ' .  $this->max_speed;
  }
}

class Warplane extends Plane {

  private $weapon;

  private $armor;

  private $vertical_start;

  /**
   * @return bool
   */
  public function isVerticalStart() {
    return $this->vertical_start;
  }

  /**
   * @param bool $vertical_start
   */
  public function setVerticalStart($vertical_start) {
    $this->vertical_start = $vertical_start;
  }

  /**
   * @return bool
   */
  public function getWeapon() {
    return $this->weapon;
  }

  /**
   * @param bool $weapon
   */
  public function setWeapon($weapon) {
    $this->weapon = $weapon;
  }

  /**
   * @return bool
   */
  public function isArmor() {
    return $this->armor;
  }

  /**
   * @param bool $armor
   */
  public function setArmor($armor) {
    $this->armor = $armor;
  }

  public function __construct($weapon, $armor = TRUE, $vertical_start = FALSE)
  {
    parent::__construct();
    $this->weapon = $weapon;
    $this->armor = $armor;
    $this->vertical_start = $vertical_start;
  }

  public function fire() {
    return 'Shooting with ' . $this->weapon;
  }

  public function fly() {
    if ($this->vertical_start) {
      echo 'Vertical start!';
      return parent::fly();

    }
    return parent::fly();
  }
}

class CivilPlane extends Plane {

  private $cargo_bay;

  /**
   * @return bool
   */
  public function isCargoBay() {
    return $this->cargo_bay;
  }

  /**
   * @param bool $cargo_bay
   */
  public function setCargoBay($cargo_bay) {
    $this->cargo_bay = $cargo_bay;
  }
  public function __construct($cargo_bay = TRUE)
  {
    parent::__construct();
    $this->cargo_bay = $cargo_bay;
  }
}
$plane = new CivilPlane();
var_dump($plane);
var_dump($plane->fly());
$warplane = new Warplane('puff', TRUE, TRUE);
var_dump($warplane);
var_dump($warplane->fly());
$warplane->setWeapon('gatling gun');
var_dump($warplane->fire());


