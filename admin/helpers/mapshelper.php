<?php
/**
 * Instaboard
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Instaboard
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-okt-24 Stilero Webdesign http://www.stilero.com
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

class Mapshelper{
    
    /**
     * Information about a location given lat and long coordinates.
     * @param float $lat Latitude
     * @param float $long Longitude
     * @param string $output To format for the response. xml or json (default)
     * @return Object Info Object
     */
    public static function getInfoFromCoordinates($lat, $long, $output='json'){
        $params = array(
            'q' => $lat.','.$long,
            'output' => $output
        );
        $url = 'http://maps.google.com/maps/geo?' .  http_build_query($params);
        $communicator = new Communicator($url);
        $communicator->query();
        $json = $communicator->getResponse();
        $info = json_decode($json);
        return $info;
    }
    
    public static function getLocationNameFromCoordinates($lat, $long, $output='json'){
        $info = self::getInfoFromCoordinates($lat, $long, $output);
        $address = '';
        $hasfoundAdress = false;
        if(isset($info->Placemark[0]->AddressDetails->Country->AdministrativeArea->Locality->LocalityName)){
            $address = $info->Placemark[0]->AddressDetails->Country->AdministrativeArea->Locality->LocalityName;
            $hasfoundAdress = true;
        }
                if(isset($info->Placemark[0]->AddressDetails->Locality->LocalityName) && !$hasfoundAdress){
            $address = $info->Placemark[0]->AddressDetails->Locality->LocalityName;
            $hasfoundAdress = true;
        }
        if(isset($info->Placemark[0]->AddressDetails->Country->Locality->LocalityName) && !$hasfoundAdress){
            $address = $info->Placemark[0]->AddressDetails->Country->Locality->LocalityName;
        }
        if(isset($info->Placemark[0]->AddressDetails->Country->AdministrativeArea->AdministrativeAreaName)){
            $address = $info->Placemark[0]->AddressDetails->Country->AdministrativeArea->AdministrativeAreaName;
            $hasfoundAdress = true;
        }
        return $address;
    }
    
    /**
     * Returns an url to Google Maps, given coordinates
     * @param float $lat Latitude
     * @param float $long Longitude
     * @return string URL to Google Maps
     */
    public static function getMapsUrl($lat, $long){
        $params = array(
            'q' => $lat.','.$long,
        );
        $url = 'http://maps.google.com/?' .  http_build_query($params);
        return $url;
    }
}
