<?php
    function convertToHourFormat($minutes) {
        if ($minutes < 60) {
            return $minutes . 'm';
        } else {
            $hours = floor($minutes / 60);
            $remainingMinutes = $minutes % 60;

            if ($remainingMinutes > 0) {
                return $hours . 'h ' . $remainingMinutes . 'm';
            } else {
                return $hours . 'h';
            }
        }
    }
?>