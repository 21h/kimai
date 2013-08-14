<?php
/**
 * This file is part of
 * Kimai - Open Source Time Tracking // http://www.kimai.org
 * (c) 2006-2012 Kimai-Development-Team
 *
 * Kimai is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; Version 3, 29 June 2007
 *
 * Kimai is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kimai; If not, see <http://www.gnu.org/licenses/>.
 */

require_once __DIR__ . '/../DataTable.php';

/**
 * Helps rendering a complex data table.
 *
 * @author Kevin Papst
 */
class Zend_View_Helper_Flat_DataTable extends Zend_View_Helper_DataTable
{

    public function renderHeader()
    {
        $head_id = $this->getConfig('header_id');
        $head_btn = $this->getConfig('header_button');

        $html = '';

        if ($head_btn !== null) {
            $html .= '<div class="left">' . $head_btn . '</div>';
        }

        $html .= '<table class="dataTable table table-striped table-bordered table-condensed"><colgroup>';

        foreach($this->getConfig('colgroup') as $colName => $colHead) {
            $html .= '<col class="'.$colName.'" />';
        }

        $html .= '</colgroup><thead><tr>';

        foreach($this->getConfig('colgroup') as $colName => $colHead) {
            $html .= '<th class="'.$colName.'">'.$colHead.'</th>';
        }

        $id = $this->getConfig('data_id');
        $html .= '</tr></thead><tbody id="'.$id.'">';


        return $html;
    }

    public function renderDataHeader()
    {
        return '';
    }

    public function renderDataFooter()
    {
        return '';
    }

    public function renderFooter()
    {
        return '</tbody></table>';
    }

} 
