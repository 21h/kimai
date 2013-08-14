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

/**
 * Helps rendering a complex data table.
 *
 * @author Kevin Papst
 */
class Zend_View_Helper_DataTable extends Zend_View_Helper_Abstract
{

    protected $config = null;

    public function dataTable($configuration = null)
    {
        if ($configuration !== null) {
            $this->config = $configuration;
        }
        return $this;
    }

    protected function getConfig($key, $default = null)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }
        return $default;
    }

    public function reset()
    {
        $this->config = array();
    }

    public function renderHeader()
    {
        $head_id = $this->getConfig('header_id');
        $head_btn = $this->getConfig('header_button');

        $html = '<div id="'.$head_id.'">';

        if ($head_btn !== null) {
            $html .= '<div class="left">' . $head_btn . '</div>';
        }

        $html .= '<table><colgroup>';

        foreach($this->getConfig('colgroup') as $colName => $colHead) {
            $html .= '<col class="'.$colName.'" />';
        }

        $html .= '</colgroup><tbody><tr>';

        foreach($this->getConfig('colgroup') as $colName => $colHead) {
            $html .= '<td class="'.$colName.'">'.$colHead.'</td>';
        }

        $html .= '</tr></tbody></table></div>';

        $id = $this->getConfig('data_id');
        $html .= '<div id="'.$id.'">';

        return $html;
    }

    public function renderDataHeader()
    {
        return '
            <div id="exptable">

            <table>

                <colgroup>
                <col class="option" />
                <col class="date" />
                <col class="time" />
                <col class="value" />
                <col class="refundable" />
                <col class="client" />
                <col class="project" />
                <col class="designation" />
                <col class="username" />
                </colgroup>

            <tbody>
            ';
    }

    public function renderDataFooter()
    {
        return '
            </tbody>
            </table>
            </div>
        ';
    }

    public function renderFooter()
    {
        return '</div>';
    }

} 
