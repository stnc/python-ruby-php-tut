<?php

/**
     * mecburi tema  kuralları
     * 
     */
namespace Builder\Engine;

interface LayoutInterfaceManager {
	
	/**
	 * bootsrap tema arayuzunu oluştur
	 *
	 * @param string $value        	
	 * @return string
	 */
	public function Bootsrap($value);
	
	/**
	 * EasyUI arayuzunu oluştur
	 * 
	 * @param string $value        	
	 * @return string
	 */
	public function EasyUI($value);
	
	/**
	 * EasyUI arayuzunu oluştur
	 * 
	 * @param string $value        	
	 * @return string
	 */
	public function EasyUIMobil($value);
	
	/**
	 * JqueryMobil arayuzunu oluştur
	 * 
	 * @param string $value        	
	 * @return string
	 */
	public function JqueryMobil($value);
}

