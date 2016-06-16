<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-06-01 15:55:43 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 15:55:43 --> Unable to connect to the database
ERROR - 2016-06-01 15:55:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2016-06-01 15:55:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2016-06-01 15:56:07 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 15:56:07 --> Unable to connect to the database
ERROR - 2016-06-01 15:56:19 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 15:56:19 --> Unable to connect to the database
ERROR - 2016-06-01 15:56:28 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 15:56:28 --> Unable to connect to the database
ERROR - 2016-06-01 15:57:09 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 15:57:09 --> Unable to connect to the database
ERROR - 2016-06-01 15:59:07 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 15:59:07 --> Unable to connect to the database
ERROR - 2016-06-01 15:59:27 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 15:59:27 --> Unable to connect to the database
ERROR - 2016-06-01 16:00:20 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 16:00:20 --> Unable to connect to the database
ERROR - 2016-06-01 16:01:38 --> Severity: Warning --> mysqli::real_connect():  D:\Study\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2016-06-01 16:01:39 --> Unable to connect to the database
ERROR - 2016-06-01 16:03:07 --> 404 Page Not Found: Faviconico/index
ERROR - 2016-06-01 16:03:08 --> 404 Page Not Found: Faviconico/index
ERROR - 2016-06-01 16:03:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:03:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:03:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:06:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:06:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:06:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:14:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:14:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:14:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:14:56 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:14:59 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:15:23 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:15:25 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:15:29 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:15:30 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:15:31 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:15:33 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:15:36 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:15:46 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:18:12 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:18:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:18:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:22:48 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:22:48 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:22:48 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:25:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:25:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:25:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:26:05 --> 404 Page Not Found: Faviconico/index
ERROR - 2016-06-01 16:26:05 --> 404 Page Not Found: Faviconico/index
ERROR - 2016-06-01 16:26:09 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:26:09 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:26:09 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:26:57 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:26:57 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:26:57 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:28:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:28:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:28:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:28:34 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:28:34 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:28:34 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:29:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:29:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:29:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:30:45 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:30:45 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:30:45 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:32:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:32:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:32:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:32:47 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:33:08 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:33:15 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:33:17 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:33:36 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:33:39 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:33:40 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:34:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:34:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:34:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:35:04 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:35:10 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:35:14 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:35:21 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:35:27 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:35:33 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:38:35 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:38:35 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:38:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:38:48 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:38:50 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:38:52 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:39:01 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:39:06 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:41:47 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:14 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:50:14 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:50:14 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:50:26 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:29 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:31 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:33 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:38 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:43 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:46 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:54 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:50:58 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:51:02 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:52:05 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:52:05 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:52:05 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:54:57 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:54:58 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:54:58 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:55:11 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:14 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:20 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:22 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:24 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:25 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:29 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:30 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:34 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:55:38 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:56:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:56:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:56:32 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:33 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:34 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:35 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:39 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:43 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:44 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:48 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:53 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:56:56 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:57:37 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:57:37 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:57:38 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:57:49 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:57:51 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:57:54 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:57:58 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:58:02 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:58:54 --> 404 Page Not Found: Faviconico/index
ERROR - 2016-06-01 16:58:54 --> 404 Page Not Found: Faviconico/index
ERROR - 2016-06-01 16:58:58 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:58:58 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:58:58 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 16:59:07 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:11 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:19 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:23 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:29 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:31 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:37 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:42 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:44 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 16:59:49 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:01:38 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:01:38 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:01:39 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:01:48 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:01:50 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:01:53 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:01:56 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:01:59 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:01:59 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:02:05 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:02:06 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:02:11 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:02:12 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:02:16 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:02:16 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:04:42 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:04:42 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:04:42 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:04:53 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:04:56 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:04:59 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:02 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:05 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:05 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:07 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:09 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:13 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:15 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:18 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:05:18 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:06 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:06:06 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:06:06 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:06:15 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:18 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:21 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:23 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:29 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:29 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:31 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:34 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:36 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:38 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:40 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:06:40 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:06 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:10:06 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:10:06 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:10:16 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:20 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:22 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:23 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:27 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:27 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:29 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:30 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:32 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:38 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:43 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:10:43 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:12:51 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:12:52 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:12:52 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:13:10 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:14 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:16 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:20 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:23 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:23 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:27 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:29 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:33 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:37 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:41 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:13:41 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:21:19 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:21:19 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:21:19 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:22:08 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:11 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:14 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:18 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:31 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:31 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:35 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:38 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:42 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:45 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:49 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:22:49 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:23:31 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:23:35 --> 404 Page Not Found: Cpas/index
ERROR - 2016-06-01 17:23:38 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:23:40 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:23:40 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:23:42 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:23:45 --> 404 Page Not Found: Cpas/index
ERROR - 2016-06-01 17:23:46 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:26:10 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:26:11 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:26:11 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:30:10 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:34:13 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:34:14 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:34:15 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:34:16 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:35:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:35:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:35:04 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:35:50 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:35:53 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:35:56 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:35:59 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:36:02 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:36:02 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:36:34 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:36:37 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:36:40 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:36:43 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:36:45 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:36:45 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:37:08 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:37:11 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:37:13 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:37:13 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:37:16 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:37:19 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:46:15 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:46:15 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:46:15 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:46:33 --> Query error: Unknown column 'pr.position_check' in 'field list' - Invalid query: SELECT e.exercise_name, pr.position_check, pr.position_count, round(sum(er.clear_count) / sum(er.target_count) * 100, 2) as achievement_rate
                from user_position_record pr, exercise_record er, exercise_info e
                where e.exercise_numb = er.exercise_numb
                  and er.exercise_date = pr.position_check_date
                  and e.exercise_numb = pr.exercise_numb
                  and pr.position_check_date = '2016-06-01'
                  and pr.user_numb = '2'
                GROUP BY e.exercise_name, pr.position_check, pr.position_count;
ERROR - 2016-06-01 17:56:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:56:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:56:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:57:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:57:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:57:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:59:47 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:59:47 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 17:59:47 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:01:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:01:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:01:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:01:32 --> Severity: Notice --> Undefined index: fail_body_point D:\Study\application\controllers\Main.php 103
ERROR - 2016-06-01 18:02:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:02:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:02:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:02:37 --> Severity: Notice --> Undefined index: fail_body_point D:\Study\application\controllers\Main.php 103
ERROR - 2016-06-01 18:03:25 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:03:25 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:03:26 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:04:02 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:04:02 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:04:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:04:14 --> Severity: Notice --> Undefined index: fail_body_point D:\Study\application\controllers\Main.php 103
ERROR - 2016-06-01 18:05:05 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:05:05 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:05:05 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:07:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:07:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:07:13 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:07:31 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:07:31 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:08:35 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:08:35 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:08:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:08:46 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:08:46 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:14:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:14:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:14:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:14:41 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:14:41 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:17:25 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:17:25 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:17:25 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:17:37 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:17:37 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:20:29 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:20:29 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:20:29 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:20:42 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:20:42 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:22:56 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:22:56 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:22:56 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:26:45 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:26:45 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:26:45 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:27:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:27:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:27:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:27:33 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:27:33 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:28:25 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:28:25 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:28:25 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:28:36 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:28:36 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:29:46 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:29:47 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:29:47 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:30:04 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:30:04 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:32:47 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:32:47 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:32:48 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:32:59 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:32:59 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:34:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:34:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:34:03 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:34:15 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:34:15 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:34:17 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:34:17 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:35:00 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:35:00 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:35:00 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:35:18 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:35:18 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:36:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:36:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:36:24 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:36:35 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:36:35 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:36:36 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:36:36 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:37:23 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:37:23 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:37:23 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:37:36 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:37:36 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:37:40 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:37:40 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:38:35 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:38:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:38:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:38:47 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:38:47 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:39:35 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:39:35 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:39:35 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:41:52 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:41:52 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:41:52 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:42:04 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:42:04 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:43:10 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:43:10 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:43:10 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:43:24 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:43:24 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:43:58 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:43:59 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:43:59 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:44:20 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:44:20 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:44:23 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:44:23 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:45:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:45:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:45:45 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:45:45 --> Severity: Notice --> Undefined index: body_point D:\Study\application\controllers\Main.php 103
ERROR - 2016-06-01 18:47:11 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:11 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:11 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:22 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:22 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:47:22 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:47:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:47:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:19 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:19 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:19 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:19 --> Severity: Notice --> Undefined property: Main::$Exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:48:19 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:48:26 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:26 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:27 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:27 --> Severity: Notice --> Undefined property: Main::$Exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:48:27 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:48:55 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:55 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:55 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:48:55 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:48:55 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 110
ERROR - 2016-06-01 18:50:29 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:50:29 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:50:29 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:50:30 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:50:30 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:51:15 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:15 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:15 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:15 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:51:15 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:51:23 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:23 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:23 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:23 --> Severity: Notice --> Undefined variable: a D:\Study\application\controllers\Main.php 113
ERROR - 2016-06-01 18:51:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:31 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:32 --> Severity: Notice --> Undefined variable: a D:\Study\application\controllers\Main.php 113
ERROR - 2016-06-01 18:51:49 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:49 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:49 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:57 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:57 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:57 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:51:57 --> Severity: Notice --> Undefined property: Main::$exercise D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:51:57 --> Severity: Error --> Call to a member function insert_Exercise_Result() on a non-object D:\Study\application\controllers\Main.php 111
ERROR - 2016-06-01 18:52:16 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:52:16 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:52:16 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:52:53 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:52:53 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:52:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:02 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:02 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:02 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:55 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:55 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:55 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:53:55 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 329
ERROR - 2016-06-01 18:53:55 --> Severity: Notice --> Undefined offset: 2 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:53:55 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:53:56 --> Severity: Notice --> Undefined offset: 3 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:53:56 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:54:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:54:21 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:54:21 --> Severity: Notice --> Undefined offset: 2 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:21 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:21 --> Severity: Notice --> Undefined offset: 3 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:21 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:54:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:54:44 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:54:46 --> Severity: Notice --> Undefined offset: 2 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:46 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:46 --> Severity: Notice --> Undefined offset: 3 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:46 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:54:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:54:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:54:55 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:56:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:56:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:56:28 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:56:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:56:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:56:36 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 18:56:49 --> Severity: Notice --> Undefined offset: 2 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:56:49 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:56:49 --> Severity: Notice --> Undefined offset: 3 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:56:49 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:45 --> Severity: Notice --> Undefined offset: 2 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:45 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:45 --> Severity: Notice --> Undefined offset: 3 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:45 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:48 --> Severity: Notice --> Undefined offset: 2 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:48 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:48 --> Severity: Notice --> Undefined offset: 3 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:48 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:50 --> Severity: Notice --> Undefined offset: 2 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:50 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:50 --> Severity: Notice --> Undefined offset: 3 D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 18:57:50 --> Severity: Notice --> Trying to get property of non-object D:\Study\application\models\Exercise.php 350
ERROR - 2016-06-01 19:02:09 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:02:09 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:02:09 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:08:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:08:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:08:54 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:11:16 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:11:16 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:11:16 --> 404 Page Not Found: Public/css
ERROR - 2016-06-01 19:23:47 --> 404 Page Not Found: Cpas/index
ERROR - 2016-06-01 19:23:57 --> 404 Page Not Found: Cpas/index
