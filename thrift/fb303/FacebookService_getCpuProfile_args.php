<?php
/**
 * Autogenerated by Thrift Compiler (0.7.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 */
namespace psdshow\scribe_thrift\thrift\fb303;


class FacebookService_getCpuProfile_args {
  static $_TSPEC;

  public $profileDurationInSec = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'profileDurationInSec',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['profileDurationInSec'])) {
        $this->profileDurationInSec = $vals['profileDurationInSec'];
      }
    }
  }

  public function getName() {
    return 'FacebookService_getCpuProfile_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->profileDurationInSec);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('FacebookService_getCpuProfile_args');
    if ($this->profileDurationInSec !== null) {
      $xfer += $output->writeFieldBegin('profileDurationInSec', TType::I32, 1);
      $xfer += $output->writeI32($this->profileDurationInSec);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}