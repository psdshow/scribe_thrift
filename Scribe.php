<?php
/**
 * Scribe日志记录
 * ============================================================================
 * @author		liliquan@kuaizi.co
 * @version		2.0.0
 * @copyright	Copyright (c) 2013-2020, Kuaizi, Inc.
 * @license		https://www.kuaizi.co
 * @link		https://www.kuaizi.co
 * ============================================================================
 */
namespace psdshow\scribe_thrift;

use psdshow\scribe_thrift\thrift\scribe\LogEntry;
use psdshow\scribe_thrift\thrift\scribe\ResultCode;
use psdshow\scribe_thrift\thrift\scribe\scribeClient;

use Thrift\Transport\TSocket;
use Thrift\Transport\TFramedTransport;
use Thrift\Protocol\TBinaryProtocol;



class Scribe {

	var $transport=null;
	var $client=null;
	var $cache=null;
	var $separator=null;
	var $log_num=0;

	function __construct($host, $port, $separator = '', $enabled = true){
		if($enabled) $this->open($host, $port);
		$this->separator = $separator;
	}

	function __destruct(){
		$this->close();
	}

	function open($host, $port){
		try{
			$socket = new TSocket($host, $port, true);
			$socket->setSendTimeout(10);
			$socket->setRecvTimeout(10);
			$this->transport = new TFramedTransport($socket);
			$protocol = new TBinaryProtocol($this->transport, false, false);
			$this->client = new scribeClient($protocol, $protocol);
			$this->transport->open();
		}catch(Exception $e){
			return false;
		}
		catch (\Throwable $e){
            //return true;
        }
		return true;
	}

	function close() {
		if ($this->transport!=null) {
			$this->transport->close();
		}
	}

	function log($category, $message, $separator = null){
		if($this->transport==null) return false;
		if($separator!=null) $this->separator = $separator;
		if(is_array($message)) $message=implode($this->separator, $message);
		try{
			$entry=new LogEntry();
			$entry->category=$category;
			$entry->message=$message;
			$messages=array($entry);
			$result=$this->client->Log($messages);
			if($result== ResultCode::OK) {
				$this->log_num++;
				return true;
			}else{
				return false;
			}
		}catch(\Exception $e){
			return false;
		}
	}
}