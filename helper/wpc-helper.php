<?php

class WPC_Helper {

    private $wpc_options_serialize;

    function __construct($wpc_options_serialize) {
        $this->wpc_options_serialize = $wpc_options_serialize;
    }

// Set timezone
// Time format is UNIX timestamp or
// PHP strtotime compatible strings
    public function dateDiff($time1, $time2, $precision = 6) {
// If not numeric then convert texts to unix timestamps
        if (!is_int($time1)) {
            $time1 = strtotime($time1);
        }
        if (!is_int($time2)) {
            $time2 = strtotime($time2);
        }

// If time1 is bigger than time2
// Then swap time1 and time2
        if ($time1 > $time2) {
            $ttime = $time1;
            $time1 = $time2;
            $time2 = $ttime;
        }

// Set up intervals and diffs arrays
        $intervals = array(
            $this->wpc_options_serialize->wpc_phrases['wpc_year_text'],
            $this->wpc_options_serialize->wpc_phrases['wpc_month_text'],
            $this->wpc_options_serialize->wpc_phrases['wpc_day_text'],
            $this->wpc_options_serialize->wpc_phrases['wpc_hour_text'],
            $this->wpc_options_serialize->wpc_phrases['wpc_minute_text'],
            $this->wpc_options_serialize->wpc_phrases['wpc_second_text']
        );
        $diffs = array();

// Loop thru all intervals
        foreach ($intervals as $interval) {
// Create temp time from time1 and interval
            $ttime = strtotime('+1 ' . $interval, $time1);
// Set initial values
            $add = 1;
            $looped = 0;
// Loop until temp time is smaller than time2
            while ($time2 >= $ttime) {
// Create new temp time from time1 and interval
                $add++;
                $ttime = strtotime("+" . $add . " " . $interval, $time1);
                $looped++;
            }

            $time1 = strtotime("+" . $looped . " " . $interval, $time1);
            $diffs[$interval] = $looped;
        }

        $count = 0;
        $times = array();
// Loop thru all diffs
        foreach ($diffs as $interval => $value) {
// Break if we have needed precission
            if ($count >= $precision) {
                break;
            }
// Add value and interval 
// if value is bigger than 0
            if ($value > 0) {
// Add s if value is not 1
                if ($value != 1) {
                    $interval .= $this->wpc_options_serialize->wpc_phrases['wpc_plural_text'];
                }
// Add value and interval to times array
                $times[] = $value . " " . $interval;
                $count++;
            }
        }

// Return string with times        
        $ago = ($times) ? $this->wpc_options_serialize->wpc_phrases['wpc_ago_text'] : $this->wpc_options_serialize->wpc_phrases['wpc_right_now_text'];
        return implode(" ", $times) . ' ' . $ago;
    }

    /**
     * get comment author avatar if exists otherwise default avatar
     */
    public function get_comment_author_avatar($comment = null) {
        global $current_user;
        get_currentuserinfo();

        $comm_auth_user_email = $current_user->user_email;
        if ($comment) {
            $comm_auth_avatar = get_avatar($comment->comment_author_email, 48);
        } else {
            if ($comm_auth_user_email) {
                $comm_auth_avatar = get_avatar($comm_auth_user_email, 48);
            } else {
                $comm_auth_avatar = '<img width="48" height="48" class="avatar avatar-48 photo avatar-default" src="' . plugins_url(WPC::$PLUGIN_DIRECTORY . '/files/img/avatar_default.png') . '" alt=""/>';
            }
        }
        return $comm_auth_avatar;
    }

}
