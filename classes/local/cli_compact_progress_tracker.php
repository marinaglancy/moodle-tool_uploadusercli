<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Class cli_compact_progress_tracker
 *
 * @package     tool_uploadusercli
 * @copyright   2020 Marina Glancy
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_uploadusercli\local;

/**
 * Tracks the progress of the user upload and outputs it in CLI script in compact format (writes to STDOUT)
 *
 * @package     tool_uploadusercli
 * @copyright   2020 Marina Glancy
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class cli_compact_progress_tracker extends text_progress_tracker {

    /**
     * Output one line (followed by newline)
     * @param string $line
     */
    protected function output_line(string $line): void {
        cli_writeln($line);
    }

    /**
     * Print table header.
     * @return void
     */
    public function start() {
        parent::start();
        $this->output_line('CSV Line | username | status');
    }

    /**
     * Flush previous line and start a new one.
     * @return void
     */
    public function flush() {
        if (empty($this->_row) or empty($this->_row['line']['normal'])) {
            // Nothing to print - each line has to have at least number.
            $this->_row = array();
            foreach ($this->columns as $col) {
                $this->_row[$col] = ['normal' => '', 'info' => '', 'warning' => '', 'error' => ''];
            }
            return;
        }

        $lineno = get_string('linex', 'tool_uploadusercli', $this->_row['line']['normal']);
        $username = strip_tags($this->_row['username']['normal']);
        $statuses = [];
        $prefix = [
            'normal' => '',
            'info' => '',
            'warning' => get_string('warningprefix', 'tool_uploadusercli') . ' ',
            'error' => get_string('errorprefix', 'tool_uploadusercli') . ' ',
        ];
        foreach ($this->_row['status'] as $type => $content) {
            if (strlen($content)) {
                $statuses[] = $prefix[$type].$content;
            }
        }

        foreach ($this->_row as $key => $field) {
            foreach ($field as $type => $content) {
                if ($key !== 'status' && $type !== 'normal' && strlen($content)) {
                    $statuses[] = $prefix[$type] . $this->headers[$key] . ': ' .
                        str_replace("\n", "\n".str_repeat(" ", strlen($prefix[$type] . $this->headers[$key]) + 4), $content);
                }
            }
        }
        foreach ($this->columns as $col) {
            $this->_row[$col] = ['normal' => '', 'info' => '', 'warning' => '', 'error' => ''];
        }

        $this->output_line($lineno . ' | ' . $username . ' | ' . join('; ', $statuses));
    }
}