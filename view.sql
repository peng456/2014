CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `end_vanet_v_user_car` AS select `u`.`user_id` AS `user_id`,`u`.`status` AS `userstatus`,`c`.`car_id` AS `car_id`,`c`.`vin` AS `vin`,`c`.`license` AS `license`,`c`.`init_mile` AS `init_mile`,`c`.`current_mile` AS `current_mile`,`c`.`engine_size` AS `engine_size`,`c`.`brand` AS `brand`,`c`.`model` AS `model`,`c`.`emissions` AS `emissions`,`c`.`maintenancemiles` AS `maintenancemiles`,`c`.`initializemiles` AS `initializemiles`,`c`.`currentmiles` AS `currentmiles`,`c`.`roadfeesvalidity` AS `roadfeesvalidity`,`c`.`drivinglicensevalidity` AS `drivinglicensevalidity`,`c`.`insurancevalidity` AS `insurancevalidity`,`c`.`comment` AS `comment`,`c`.`status` AS `status`,`c`.`vehicle_name` AS `vehicle_name`,`c`.`vehicle_avatar` AS `vehicle_avatar`,`c`.`years` AS `years`,`c`.`create_time` AS `create_time` from ((`end_vanet_usercar` `uc` left join `end_vanet_user` `u` on((`u`.`user_id` = `uc`.`user_id`))) left join `end_vanet_car` `c` on((`c`.`car_id` = `uc`.`car_id`)));

CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `end_vanet_v_ucn` AS select `u`.`user_id` AS `user_id`,`u`.`userstatus` AS `userstatus`,`c`.`car_id` AS `car_id`,`c`.`vin` AS `vin`,`c`.`license` AS `license`,`c`.`init_mile` AS `init_mile`,`c`.`current_mile` AS `current_mile`,`c`.`engine_size` AS `engine_size`,`c`.`brand` AS `brand`,`c`.`model` AS `model`,`c`.`emissions` AS `emissions`,`c`.`maintenancemiles` AS `maintenancemiles`,`c`.`initializemiles` AS `initializemiles`,`c`.`currentmiles` AS `currentmiles`,`c`.`roadfeesvalidity` AS `roadfeesvalidity`,`c`.`drivinglicensevalidity` AS `drivinglicensevalidity`,`c`.`insurancevalidity` AS `insurancevalidity`,`c`.`comment` AS `comment`,`c`.`carstatus` AS `carstatus`,`c`.`create_time` AS `create_time`,`c`.`nobd_id` AS `nobd_id`,`c`.`sn` AS `sn`,`c`.`pw` AS `pw`,`c`.`sim_no` AS `sim_no`,`c`.`active_time` AS `active_time`,`c`.`nobdstatus` AS `nobdstatus`,`u`.`vehicle_name` AS `vehicle_name`,`u`.`vehicle_avatar` AS `vehicle_avatar`,`u`.`years` AS `years` from (`end_vanet_v_user_car` `u` join `end_vanet_v_car_nobd` `c` on((`u`.`car_id` = `c`.`car_id`)));

CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `end_vanet_v_nobd_stats` AS select `o`.`nobd_id` AS `nobd_id`,COUNT(*) AS `obd_total_count`,MAX(`create_time`) AS `obd_max_ctime`,MIN(`create_time`) AS `obd_min_ctime`,MAX(`obds12_id`) AS `obds12_max_id`,MIN(`obds12_id`) AS `obds12_min_id` from `end_vanet_obds12` `o` group by `nobd_id`;

CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `end_vanet_v_gps_stats` AS select `g`.`nobd_id` AS `nobd_id`,COUNT(*) AS `gps_total_count`,MAX(`create_time`) AS `gps_max_ctime`,MIN(`create_time`) AS `gps_min_ctime`,MAX(`gpsdata_id`) AS `gpsdata_max_id`,MIN(`gpsdata_id`) AS `gpsdata_min_id` from `end_vanet_gpsdata` `g` group by `nobd_id`;

CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `end_vanet_v_ucn_stats` AS select `u`.`nobd_id` AS `nobd_id`,`u`.`sn` AS `sn`,`u`.`pw` AS `pw`,`u`.`sim_no` AS `sim_no`,`u`.`active_time` AS `active_time`,`u`.`nobdstatus` AS `nobdstatus`,`u`.`user_id` AS `user_id`,`u`.`userstatus` AS `userstatus`,`u`.`car_id` AS `car_id`,`u`.`vin` AS `vin`,`u`.`license` AS `license`,`u`.`init_mile` AS `init_mile`,`u`.`current_mile` AS `current_mile`,`u`.`engine_size` AS `engine_size`,`u`.`brand` AS `brand`,`u`.`model` AS `model`,`u`.`emissions` AS `emissions`,`u`.`maintenancemiles` AS `maintenancemiles`,`u`.`initializemiles` AS `initializemiles`,`u`.`currentmiles` AS `currentmiles`,`u`.`roadfeesvalidity` AS `roadfeesvalidity`,`u`.`drivinglicensevalidity` AS `drivinglicensevalidity`,`u`.`insurancevalidity` AS `insurancevalidity`,`u`.`comment` AS `comment`,`u`.`carstatus` AS `carstatus`,`u`.`vehicle_name` AS `vehicle_name`,`u`.`vehicle_avatar` AS `vehicle_avatar`,`u`.`years` AS `years`,`u`.`create_time` AS `create_time`,`n`.`obd_total_count` AS `obd_total_count`,`n`.`obd_max_ctime` AS `obd_max_ctime`,`n`.`obd_min_ctime` AS `obd_min_ctime`,`n`.`obds12_max_id` AS `obds12_max_id`,`n`.`obds12_min_id` AS `obds12_min_id`,`g`.`gps_total_count` AS `gps_total_count`,`g`.`gps_max_ctime` AS `gps_max_ctime`,`g`.`gps_min_ctime` AS `gps_min_ctime`,`g`.`gpsdata_max_id` AS `gpsdata_max_id`,`g`.`gpsdata_min_id` AS `gpsdata_min_id` from ( (`end_vanet_v_ucn` `u` join `end_vanet_v_nobd_stats` `n` on((`u`.`nobd_id` = `n`.`nobd_id`))) join `end_vanet_v_gps_stats` `g` on((`g`.`nobd_id` = `n`.`nobd_id`)) ) ;