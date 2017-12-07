<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-09-17 14:53:39 --> GAGAL Login , IP Address : ::1
ERROR - 2017-09-17 14:55:35 --> SUKSES login member dengan id 2 , IP Address : ::1
ERROR - 2017-09-17 18:14:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SELECT a.member_id, a.user_id, team_id, CONCAT(member_social_firstname, ' ', member_social_lastname) AS member_name, member_image, member_banner, is_team_admin, username, password, email FROM member_social a INNER JOIN user b ON a.user_id = b.id_user WHERE a.member_id = 
