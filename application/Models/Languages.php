<?php
/**
 *  Languages -> Languages database model for languages table.
 *
* 	Copyright (c) <2009>, Markus Riihel�
* 	Copyright (c) <2009>, Mikko Sallinen
*
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License 
 * as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied  
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for  
 * more details.
 * 
 * You should have received a copy of the GNU General Public License along with this program; if not, write to the Free 
 * Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * License text found in /license/
 */

/**
 *  Languages - class
 *
 *  @package 	models
 *  @author 		Markus Riihel� & Mikko Sallinen
 *  @copyright 	2009 Markus Riihel� & Mikko Sallinen
 *  @license 	GPL v2
 *  @version 	1.0
 */ 
class Models_Languages extends Zend_Db_Table_Abstract
{
	// Table name
    protected $_name = 'languages_lng';
	
	// Table primary key
	protected $_primary = 'id_lng';
	
	// Table dependet tables
	protected $_dependentTables = array('Models_User', 'Models_Industries');
	
	/*
	protected $_referenceMap    = array(
        'Languages' => array(
            'columns'           => array('id_lng'),
            'refTableClass'     => 'Models_Content',
            'refColumns'        => array('id_lng_usr')
        )
    );
	*/
    
    public function getLangIdByLangName($lang)
    {
        $select = $this->select()
				->from($this, array('id_lng'))
				->where("`iso6391_lng` = '$lang'");
        
		$result = $this->fetchAll($select)->toArray();
        
        return $result[0]['id_lng'];
    }
} // end of class
?>