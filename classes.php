<?php

interface iElectronics
{
  public function isOwner(string $guess);
}

class Electronics implements iElectronics
{

  // properties

  private $model = "";
  private $owner = "";
  protected $adapter = null;


  // methods
  
  public function __construct()
  {
    $this->adapter = new Adapter;
  }

  public function setModel(string $model)
  {
    $this->model = $model;
  }

  public function getModel()
  {
    return $this->model;
  }

  public function setOwner(string $owner)
  { 
    $this->owner = $owner;
  }

  public function getOwner()
  {
    return $this->owner;
  }

  public function isOwner(string $guess)
  { 
    return (strtolower($guess) == strtolower($this->owner)) ? TRUE : FALSE;
  }

  public function setAdapter(Adapter $adapter)
  {
    $this->adapter = $adapter;
  }

  public function getAdapter()
  {
    return $this->adapter;
  }

  public function __destruct()
  {
    // nothing
  }
}



class AudioElectronics extends Electronics
{
  // properties
  private $rmsWatts;

  // methods

  public function __construct(string $rmsWatts = NULL)
  {
    $this->rms_watts = $rmsWatts;
  }

  public function setRMSWatts($rmsWatts)
  {
    $this->rmsWatts = $rmsWatts;
  }

  public function getRMSWatts()
  {
    return $this->rmsWatts;
  }
}



class ScreenElectronics extends Electronics
{
  // properties

  private $device;
  private $screenSize;
  private $batteryLife;

  // methods

  public function __construct(string $device = "",
                              string $screenSize = "",
                              BatteryLife $batteryLife = NULL)
  {
    $this->device = $device;
    $this->screenSize = $screenSize;
    $this->batteryLife = $batteryLife;
  }

  public function setDevice(string $device)
  {
    $this->device = $device;
  }

  public function getDevice()
  {
    return $this->device;
  }

  public function setScreenSize(string $screenSize)
  {
    $this->screenSize = $screenSize;
  }

  public function getScreenSize()
  {
    return $this->screenSize;
  }

  use BatteryLife;
}

trait BatteryLife
{
  // properties

  private $inUseTime;

  // methods

  public function __construct(float $inUseTime = 0)
  {
    $this->inUseTime = $inUseTime;
  }

  public function setInUseTime(float $inUseTime)
  {
    $this->inUseTime = $inUseTime;
  }

  public function getInUseTime()
  {
    return $this->inUseTime;
  }
}



class Adapter
{
  // properties

  private $make;
  private $power;

  // methods

  public function __construct(string $make = "",
                              string $power = "120V to 24V")
  {
    $this->make = $make;
    $this->power = $power;
  }

  public function setMake(string $make)
  { 
    $this->make = $make;
  }

  public function getMake()
  { 
    return $this->make;
  }
  
  public function setPower(string $power)
  { 
    $this->power = $power;
  }
  
  public function getPower()
  { 
    return $this->power;
  }
}



abstract class enumScreenElectronics //extends Enum
{
  const PHONE  = "phone";
  const LAPTOP = "laptop";
  const TV     = "tv";
}

?>
