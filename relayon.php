<?php

  system("gpio -g mode 27 out");
  system("gpio -g write 27 1");
  usleep(25000);
  system("gpio -g mode 27 out");
  system("gpio -g write 27 0");
  //system("gpio -g mode 17 out");
  //system("gpio -g write 17 1");
 ?>
