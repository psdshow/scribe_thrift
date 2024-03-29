<?php
/**
 * Autogenerated by Thrift Compiler (0.7.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 */
namespace psdshow\scribe_thrift\thrift\fb303;

interface FacebookServiceIf {
  public function getName();
  public function getVersion();
  public function getStatus();
  public function getStatusDetails();
  public function getCounters();
  public function getCounter($key);
  public function setOption($key, $value);
  public function getOption($key);
  public function getOptions();
  public function getCpuProfile($profileDurationInSec);
  public function aliveSince();
  public function reinitialize();
  public function shutdown();
}